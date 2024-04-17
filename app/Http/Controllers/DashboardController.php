<?php

namespace App\Http\Controllers;

use App\Http\Services\FileManagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public FileManagementService $fileService;
    public function  __construct(
        FileManagementService $fileService
    ) {
        $this->fileService = $fileService;
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
        return view("app.landingpage.service-option-next", \compact(
            "sessionTrash",
            "sessionImages",
            "totalMaxPrice",
            "totalMinPrice",
        ));
    }
}
