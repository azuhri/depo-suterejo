<?php

namespace App\Http\Services;

use App\Http\Repositories\AddressRepository;
use App\Http\Services\Interfaces\InterfaceAddressService;
use Exception;
use Illuminate\Http\Request;

class AddressService implements InterfaceAddressService {
    public AddressRepository $addressRepo;
    public function __construct(
        AddressRepository $addressRepo
    )
    {
        $this->addressRepo = $addressRepo;
    }

    public function createAddress($request) {
        return $this->addressRepo->createAddress($request);
    }

    public function updateAddress($request) {
        return $this->addressRepo->updateAddress($request);
    }

    public function getAddressById($addressId) {
        return $this->addressRepo->getAddressById($addressId);
    }

    public function getAllAddressUserById($userId) {
        return $this->addressRepo->getAllAddressUserById($userId);
    }

    public function getDefaultAddressUserByUserId($userId) {
        return $this->addressRepo->getDefaultAddressUserByUserId($userId);
    }

    public function deleteAddressById($addressId) {
        $address = $this->getAddressById($addressId);
        if(!$address)
            throw new Exception("Data address tidak ditemukan");

        $address->delete();
        return $address;
    }

    public function selectAddress($addresId) {
        return $this->addressRepo->selectAddressById($addresId);
    }
}
