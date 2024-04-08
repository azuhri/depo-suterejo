<?php

namespace App\Http\Controllers;

use App\Http\Services\TrashCategoryService;
use App\Http\Services\TrashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public TrashCategoryService $trashCategoryService;
    public TrashService $trashService;

    public function __construct(
        TrashCategoryService $trashCategoryService,
        TrashService $trashService
    ) {
        $this->trashCategoryService = $trashCategoryService;
        $this->trashService = $trashService;
    }

    public function adminDashboardView()
    {
        return view("app.admin.dashboard");
    }

    public function dataSampahView()
    {
        return view("app.admin.data-sampah", [
            "trash_categories" => $this->trashCategoryService->getAllTrashCategory(),
            "total_data_sampah" => \count($this->trashService->getAllTrash("id","DESC")),
        ]);
    }

    public function logout(Request $request)
    { {
            $request->session()->flush();
            $request->session()->regenerate();
            Auth::guard("admins")->logout();
            return redirect()->route("admin.login.view")->with("success", "Berhasil keluar dari dashboard admin");
        }
    }
}
