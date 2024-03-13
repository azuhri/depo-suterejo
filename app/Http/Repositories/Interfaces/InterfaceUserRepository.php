<?php

namespace App\Http\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\User;

interface InterfaceUserRepository {
    public function createUser(Request $request);
    public function getUserById($userId);
    public function getUserByPhonenumber($phonenumber);
    public function isExistPhonenumber($userId, $phonenumber);
    public function isExistEmail($userId, $phonenumber);
    public function isPhonenumberlAvailable($phonenumber);
    public function isEmailAvailable($email);
    public function getAllUser();
    public function getUserLogin();
    public function updateUser(Request $user, $userId);
}

