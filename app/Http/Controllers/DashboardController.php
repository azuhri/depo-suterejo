<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepository;
use App\Http\Services\AddressService;
use App\Http\Services\FileManagementService;
use App\Http\Services\JsonServices;
use App\Http\Services\TransactionService;
use App\Models\AssetTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public FileManagementService $fileService;
    public AddressService $addressService;
    public JsonServices $json;
    public TransactionService $transaction;
    public TransactionRepository $transactionRepo;

    public function  __construct(
        FileManagementService $fileService,
        AddressService $addressService,
        JsonServices $json,
        TransactionService $transaction,
        TransactionRepository $transactionRepo,
    ) {
        $this->fileService = $fileService;
        $this->addressService = $addressService;
        $this->json = $json;
        $this->transaction = $transaction;
        $this->transactionRepo = $transactionRepo;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        Auth::logout();
        return redirect()->route("landing.home")->with("success", "Berhasil keluar dari akun Anda");
    }

    public function submitDataRequestService(Request $request)
    {
        $trashes = \json_decode($request->input("trashes"));

        $pathImages = [];
        for ($i = 0; $i < 3; $i++) {
            $image = $request->file("image_" . $i);
            if ($image) {
                $path = $this->fileService->storeFile(
                    $image,
                    "dynamic_assets/trash_transaction_image",
                    str_replace(" ", "-", $image->getClientOriginalName())
                );
                $pathImages[] = $path;
            }
        }
        \session()->put("path_images", $pathImages);
        \session()->put("trashes", $trashes);

        return \response()->json(["data" => $trashes]);
    }

    public function serviceNextStepIndex(Request $request)
    {
        // $request->session()->forget("trashes");
        // $request->session()->forget("paht_images");
        // dd($request->session()->all());
        $sessionTrash = \session("trashes");
        $sessionImages = \session("path_images");
        if (!$sessionTrash) {
            return \redirect()->route("account.services.option");
        }

        $totalMinPrice = 0;
        $totalMaxPrice = 0;
        foreach ($sessionTrash as $trash) {
            $totalMaxPrice += $trash->maxPrice;
            $totalMinPrice += $trash->minPrice;
        }

        $defaultAddress = $this->addressService->getDefaultAddressUserByUserId(Auth::user()->id);
        $allAddress = $this->addressService->getAllAddressUserById(Auth::user()->id);
        $allAddress = $allAddress->sortByDesc("status");
        $allAddress = $allAddress->values()->all();
        return view("app.landingpage.service-option-next", \compact(
            "sessionTrash",
            "sessionImages",
            "totalMaxPrice",
            "totalMinPrice",
            "allAddress",
            "defaultAddress"
        ));
    }

    public function paymentService(Request $request)
    {
        try {
            $request->validate([
                "address_id"  => ["required"],
                "order_date"  => ["required"],
                "range_time" => ["required"],
                "bank_name" => ["required"],
                "rekening_number" => ["required", "numeric"],
                "rekening_name" => ["required"],
            ], [
                "address_id.required" => "Silahkan Anda buat alamat dahulu",
                "order_date.required" => "Silahkan isi tanggal penjemputan",
                "bank_name.required" => "Silahkan isi tipe Bank / E-Wallet pembayaran",
                "rekening_number.required" => "Silahkan isi nomor rekening / no HP penerima pembayaran",
                "rekening_name.required" => "Silahkan isi atas nama penerima pembayaran",
            ]);

            $trashes = \session("trashes");
            $totalAmountMin = 0;
            $totalAmountMax = 0;
            $totalWeight = 0;
            foreach ($trashes as $trash) {
                $totalAmountMin += $trash->minPrice;
                $totalAmountMax += $trash->maxPrice;
                $totalWeight += $trash->weight;
            }
            $params = $request->toArray();
            $params["user_id"] = Auth::user()->id;
            $params["order_date"] = date("Y-m-d H:i:s", strtotime($request->order_date));
            $params["estimate_amount_minimum"] = $totalAmountMin;
            $params["estimate_amount_maximum"] = $totalAmountMax;
            $params["amount"] = 0;
            $params["weight_kg"] = $totalWeight;
            $transaction = $this->transaction->newTransaction($params);
            $listImages = \session("path_images");
            $listAssets = [];
            foreach ($listImages as $image) {
                $assets["transaction_id"] = $transaction->id;
                $assets["path_image"] = $image;
                $listAssets[] = $assets;
            }
            $listItem = [];
            foreach ($trashes as $trash) {
                $trashData["trash_id"] = $trash->id;
                $trashData["transaction_id"] = $transaction->id;
                $trashData["weight_kg"] = $trash->weight;
                $listItem[] = $trashData;
            }
            AssetTransaction::insert($listAssets);
            TransactionDetail::insert($listItem);

             session()->forget("trashes");
             session()->forget("paht_images");
            \session()->put("transaction", $transaction);
            return $this->json->responseDataWithMessage($transaction, "Berhasil membuat transaksi");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function transactionSuccedIndex() {
        $transaction = session("transaction");
        if(!$transaction) {
            abort(404);
        }

        return view("app.landingpage.transaction-succed", compact("transaction"));
    }

    public function transactionListIndex() {
        return \view("app.landingpage.list-transaction.index", [
            "all_transactions" => $this->transactionRepo->getDataTransaction([
                "user_id" => Auth::user()->id,
            ]),
            "finished_transactions" => $this->transactionRepo->getDataTransaction([
                "user_id" => Auth::user()->id,
                "status_transaction" => "FINISHED",
            ]),
        ]);
    }

    public function getDataListTransaction(Request $request) {
        $datas = $this->transactionRepo->getDataTransaction([
            "relations" => ["detail", "detail.trash", "assets", "address"],
            "user_id" => Auth::user()->id,
            ...$request->toArray(),
        ]);

        if(count($datas)) {
            $responseHtml = view("app.landingpage.list-transaction.partials.list", [
                "datas" => $datas,
            ])->render();
        } else {
            $responseHtml = "<div class='flex justify-center text-xs bg-base-300 font-light p-4 rounded-xl'>Tidak ada data transaksi</div>";
        }

        return \response()->json(["data" => $responseHtml]);
    }
}
