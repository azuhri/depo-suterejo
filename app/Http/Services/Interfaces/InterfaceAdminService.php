<?php

namespace App\Http\Services\Interfaces;

use App\Http\DTO\UserDTO;
use Illuminate\Http\Request;

interface InterfaceAdminService {
    public function loginAdmin($request);
    public function getAdminLogin();
    public function updateDataAdmin(Request $admin, $adminId);
    public function getAllAdmin();
}