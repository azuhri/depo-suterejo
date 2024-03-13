<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function mainPageView()
    {
        return "ini dashboard";
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        Auth::logout();
        return redirect()->route("auth.login")->with("success","Berhasil keluar dari akun Anda");
    }
}
