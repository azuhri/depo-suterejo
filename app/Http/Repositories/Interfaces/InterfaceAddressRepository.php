<?php

namespace App\Http\Repositories\Interfaces;

use Illuminate\Http\Request;

interface InterfaceAddressRepository {
    public function createAddress($request);
    public function updateAddress($request);
    public function getAddressById($addressId);
    public function getAllAddressUserById($userId);
    public function getDefaultAddressUserByUserId($userId);
}

