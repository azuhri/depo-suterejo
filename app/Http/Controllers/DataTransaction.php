<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepository;
use App\Http\Services\FileManagementService;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Weight;
use Exception;
use Illuminate\Http\Request;

class DataTransaction extends Controller
{
    public $transaction;
    public FileManagementService $fileService;
    public function __construct(
        TransactionRepository $transaction,
        FileManagementService $fileService,
    ) {
        $this->transaction = $transaction;
        $this->fileService = $fileService;
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

    public function uploadPaymentDoc(Request $request, $uniqueCode) {
        try {
            $request->validate([
                "payment_doc" => ["required", "mimes:png,jpg,jpeg"]
            ], [
                "payment_doc.mimes" => "file bukti pembayaran harus berbentuk extension jpg/png/jpeg"
            ]);
            $findTrx = $this->transaction->getDataByUniqueCode($uniqueCode);
            if (!$findTrx) {
                throw new Exception("data trx not found");
            }
            if($findTrx->payment_doc_path) {
                $this->fileService->destroyFile($findTrx->payment_doc_path);
            }
            $path = $this->fileService->storeFile(
                $request->file("payment_doc"),
                "dynamic_assets/payment_doc/",
                $request->name
            );
            $findTrx->payment_doc_path = $path;
            $findTrx->status_transaction = "PAID";
            $findTrx->is_paid = \true;
            $findTrx->update();

            return \response()->json(["success" => true]);
        } catch (\Throwable $th) {
            return \response()->json(["errors" => $th->getMessage()], 400);
        }
    }
}
