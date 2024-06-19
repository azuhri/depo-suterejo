<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepository;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Weight;
use Illuminate\Http\Request;

class DataTransaction extends Controller
{
    public $transaction;
    public function __construct(
        TransactionRepository $transaction,
    ) {
        $this->transaction = $transaction;
    }

    public function getDatatable(Request $request)
    {
        $status = $request->status;
        $limit = $request->limit;

        $transaction = Transaction::query()->with([
            "detail",
            "address" => function ($query) {
                $query->withTrashed();
            },
            "assets",
            "user"
        ]);

        if($request->orderDate) {
            $orderDate = date("Y-m-d", strtotime($request->orderDate));
            $transaction->where("order_date", "=", $orderDate);
        }

        if ($status != "*") {
            $transaction->where("status_transaction", $status);
        }

        if ($limit != "*") {
            $transaction->limit($limit);
        }

        $transaction->orderBy("id", "DESC");

        return response()->json(["data" => $transaction->get()]);
    }

    public function detail($id)
    {
        $transaction = $this->transaction->getDataByUniqueCode($id, [
            "detail",
            "detail.trash",
            "assets",
            "address",
            "user",
        ]);

        if (!$transaction) {
            \abort(404);
        }

        return view("app.admin.detail-transaksi", compact(
            "transaction",
        ));
    }

    public function pickupOrder($uniqueCode)
    {
        try {
            $findTrx = $this->transaction->getDataByUniqueCode($uniqueCode);
            if (!$findTrx) {
                \abort(404);
            }
            $findTrx->status_transaction = "PICKUP";
            $findTrx->update();
            return \redirect()->back();
        } catch (\Throwable $th) {
            \abort(404);
        }
    }

    public function finishedOrder($uniqueCode)
    {
        try {
            $findTrx = $this->transaction->getDataByUniqueCode($uniqueCode, ["detail"]);
            if (!$findTrx) {
                \abort(404);
            }
            $totalHarga = 0;
            foreach ($findTrx->detail as $detail) {
                $totalHarga += $detail->trash->maximum_price * $detail->final_weight_kg;
            }
            $findTrx->final_amount = $totalHarga - ($totalHarga * 0.1);
            $findTrx->status_transaction = "FINISHED";
            $findTrx->update();
            return \redirect()->back();
        } catch (\Throwable $th) {
            \abort(404);
        }
    }

    public function scalling()
    {
        $getWeight = Weight::first();

        return \response()->json(["data" => $getWeight->weight ?? 0]);
    }

    public function postDataWeight(Request $request, $detailTrxId)
    {
        try {
            $findDetailTrx = TransactionDetail::findOrFail($detailTrxId);
            $findTrx = Transaction::find($findDetailTrx->transaction_id);
            if ($findDetailTrx->final_weight_kg != 0) {
                $findTrx->final_weight_kg -= $findDetailTrx->final_weight_kg;
            }
            $findDetailTrx->final_weight_kg = $request->weight;
            $findTrx->final_weight_kg += $request->weight;
            // dd($findDetailTrx, $findTrx);
            $findDetailTrx->update();
            $findTrx->update();

            return \response()->json(["success" => true]);
        } catch (\Throwable $th) {
            return \response()->json(["message" => $th->getMessage()], 400);
        }
    }
}
