<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin() {
        return \view("app.auth.login");
    }

    public function viewRegister() {
        return view("app.auth.register");
    }
}
