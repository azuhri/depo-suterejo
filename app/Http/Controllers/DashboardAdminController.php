<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function adminDashboardView() {
        return view("app.admin.dashboard");
    }

    public function dataSampahView() {
        return view("app.admin.data-sampah");
    }

    public function logout(Request $request) {
    {
        $request->session()->flush();
        $request->session()->regenerate();
        Auth::guard("admins")->logout();
        return redirect()->route("admin.login.view")->with("success","Berhasil keluar dari dashboard admin");
    }
    }

}
