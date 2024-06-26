<?php

namespace App\Http\Controllers;

use App\Http\Services\TrashCategoryService;
use App\Http\Services\TrashService;
use App\Http\Services\UserService;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $thisMonth = Carbon::now()->firstOfMonth();
        return view("app.admin.dashboard", [
            "totalUsers" => count($this->userService->getAllUser()),
            "totalTrashCategories" => count($this->trashCategoryService->getAllTrashCategory()),
            "totalTransaction" => Transaction::count(),
            "totalTrashes" => count($this->trashService->getAllTrash("id","DESC")),
            "total_weight_this_month" => Transaction::where("created_at",">=", $thisMonth)->sum("final_weight_kg"),
        ]);
    }

    public function dataSampahView()
    {
        return view("app.admin.data-sampah", [
            "trash_categories" => $this->trashCategoryService->getAllTrashCategory(),
            "total_data_sampah" => \count($this->trashService->getAllTrash("id", "DESC")),
        ]);
    }

    public function dataTransactionView() {
        return view("app.admin.data-transaksi", [
            "total_transaction_today" => Transaction::where("order_date", \date("Y-m-d"))->count(),
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
