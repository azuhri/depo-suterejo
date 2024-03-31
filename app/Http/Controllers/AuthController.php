<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminService;
use App\Http\Services\RedirectHandlingErrorService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public UserService $serviceUser;
    public RedirectHandlingErrorService $redirectHandlingError;
    public AdminService $serviceAdmin;

    public function __construct(
        UserService $userService, 
        AdminService $adminService,
        RedirectHandlingErrorService $redirectHandlingError
    )
    {
        $this->serviceUser = $userService;
        $this->serviceAdmin = $adminService;
        $this->redirectHandlingError = $redirectHandlingError;
    }

    public function viewLogin()
    {
        return \view("app.auth.login");
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                "username" => ["required"],
                "password" => ["required"],
            ], [
                "username" => "Maaf.. email atau username masih belum diisi!",
                "password" => "Maaf.. kata sandi masih belum diisi!",
            ]);
            if ($this->serviceUser->loginWithEmail($request->username, $request->password))
                return redirect()->route("landing.home")->with("success", "Anda berhasil masuk ke Akun Anda");;

            if ($this->serviceUser->loginWithPhonenumber($request->username, $request->password))
                return redirect()->route("landing.home")->with("success", "Anda berhasil masuk ke Akun Anda");;

            return redirect()->back()->with("error", "Maaf.. username atau nomor HP dan password salah")->withInput();
        } catch (\Throwable $th) {
            return \redirect()->back()->with("error", $th->getMessage())->withInput();
        }
    }

    public function viewRegister()
    {
        return view("app.auth.register");
    }

    public function register(Request $request)
    {
        try {
            $maxChar = 50;
            $minPassword = 12;
            $maxPhonenumber = 12;
            $minPhonenumber = 10;
            $request->validate([
                "email" => ["required", "max:{$maxChar}"],
                "password" => ["required", "max:{$maxChar}", "min:{$minPassword}"],
                "phonenumber" => ["required", "min:{$minPhonenumber}", "max:{$maxPhonenumber}"],
                "name" => ["required", "max:{$maxChar}"],
            ], [
                "email.max" => "Email/username maksimal {$maxChar} karakter",
                "password.max" => "Kata sandi maksimal {$maxChar} karakter",
                "password.min" => "Kata sandi minimal {$minPassword} karakter",
                "phonenumber.min" => "Nomor HP minimal {$minPhonenumber} karakter",
                "phonenumber.max" => "Nomor HP maksimal {$maxPhonenumber} karakter",
                "name.max" => "Nama maksimal {$maxChar} karakter",

                "email" => "Maaf.. email/username masih belum diisi!",
                "password" => "Maaf.. kata sandi masih belum diisi!",
                "phonenumber" => "Maaf.. no HP masih belum diisi!",
                "name" => "Maaf.. nama masih belum diisi!",
            ]);
            $user = $this->serviceUser->register($request);
            return \redirect()->route("auth.login")->with("success", "Anda berhasil membuat akun, silahkan masuk dengan akun Anda");
        } catch (\Throwable $th) {
            return \redirect()->back()->with("error", $th->getMessage())->withInput();
        }
    }

    public function loginAdminView() {
        return view("app.admin.login");
    }

    public function loginAdmin(Request $request){
        try {
            $this->serviceAdmin->loginAdmin($request);
            return redirect()->route("admin.dashboard.index");
        } catch (\Throwable $th) {
            return $this->redirectHandlingError->redirectBackFlashErrorWithMessage("error", $th->getMessage());
        }
    }
}
