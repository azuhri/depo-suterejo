<?php

namespace App\Http\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\User;

interface InterfaceAdminRepository {
    public function createAdmin(Request $request);
    public function getAdminById($userId);
    public function getAllAdmin();
    public function getAdminLogin();
    public function updateAdmin(Request $user, $id);
}

