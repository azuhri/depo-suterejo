<?php

namespace App\Http\Services\Interfaces;

use App\Http\DTO\UserDTO;
use Illuminate\Http\Request;

interface InterfaceUserService {
    public function register(Request $dto);        
    public function loginWithEmail(string $email, $password);
    public function loginWithPhonenumber(string $phonenumber, string $password);
    public function getUserLogin();
    public function updateDataUser(Request $user, $userId);
    public function getAllUser();
    public function getUserByPhonenumberOrId($parameterId);
}