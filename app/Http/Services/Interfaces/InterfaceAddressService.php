<?php

namespace App\Http\Services\Interfaces;

use Illuminate\Http\Request;

interface InterfaceAddressService {
    public function createAddress($request);
    public function updateAddress($request);
    public function getAddressById($addressId);
    public function getAllAddressUserById($userId);
    public function getDefaultAddressUserByUserId($userId);
    public function deleteAddressById($addressId);
}