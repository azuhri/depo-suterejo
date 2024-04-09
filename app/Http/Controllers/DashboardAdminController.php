<?php

namespace App\Http\Controllers;

use App\Http\Services\TrashCategoryService;
use App\Http\Services\TrashService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public TrashCategoryService $trashCategoryService;
    public TrashService $trashService;
    public UserService $userService;

    public function __construct(
        TrashCategoryService $trashCategoryService,
        UserService $userService,
        TrashService $trashService,
    ) {
        $this->trashCategoryService = $trashCategoryService;
        $this->trashService = $trashService;
        $this->userService = $userService;
    }

    public function adminDashboardView()
    {
        return view("app.admin.dashboard", [
            "totalUsers" => count($this->userService->getAllUser()),
            "totalTrashCategories" => count($this->trashCategoryService->getAllTrashCategory()),
            "totalTrashes" => count($this->trashService->getAllTrash("id","DESC")),
        ]);
    }

    public function dataSampahView()
    {
        return view("app.admin.data-sampah", [
            "trash_categories" => $this->trashCategoryService->getAllTrashCategory(),
            "total_data_sampah" => \count($this->trashService->getAllTrash("id", "DESC")),
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
