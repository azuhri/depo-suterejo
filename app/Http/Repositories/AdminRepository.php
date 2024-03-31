<?php

namespace App\Http\Repositories;

use App\Http\DTO\UserDTO;
use App\Http\Repositories\Interfaces\InterfaceAdminRepository;
use App\Http\Repositories\Interfaces\InterfaceUserRepository;
use App\Models\Admin;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class AdminRepository implements InterfaceAdminRepository {

    public function createAdmin(Request $request)  {
        return Admin::create([
            "name" => $request->name,
            "email" => $request->email, 
            "password" => $request->password,
        ]);   
    }

    public function getAdminById($id)  {
        return Admin::find($id);   
    }

    public function getAdminLogin() {
        return Auth::user();
    }

    public function getAllAdmin()  {
        return Admin::all(); 
    }

    public function updateAdmin(Request $request, $id)  {
        $user = Admin::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return $user;   
    }
}
