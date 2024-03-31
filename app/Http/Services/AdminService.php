<?php

namespace App\Http\Services;

use App\Http\DTO\UserDTO;
use App\Http\Repositories\AdminRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\Interfaces\InterfaceAdminService;
use App\Http\Services\Interfaces\InterfaceUserService;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminService implements InterfaceAdminService
{
    public AdminRepository $adminRepo;
    public JsonServices $json;

    public function __construct(AdminRepository $adminRepo, JsonServices $json)
    {
        $this->adminRepo = $adminRepo;
        $this->json = $json;
    }


    public function loginAdmin($request)
    {
        $credentials = Auth::guard("admins")->attempt(
            [
                "email" => $request->email,
                "password" => $request->password,
            ],
            $request->remember_me ? true : false,
        );
        if (!$credentials)
           throw new Exception("Maaf email atau password Anda salah!");

        return true;
    }

    public function getAdminLogin()
    {
        if (!$admin = Auth::guard("admins")->user()) {
            throw new Exception("session login doenst exist!");
        }

        return $admin;
    }

    public function updateDataAdmin(Request $admin, $adminId)
    {

        $admin = $this->adminRepo->updateAdmin($admin, $adminId);

        return $admin;
    }

    public function getAllAdmin()
    {
        return $this->adminRepo->getAllAdmin();
    }
}
