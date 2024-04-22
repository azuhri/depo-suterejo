<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\InterfaceAddressRepository;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressRepository implements InterfaceAddressRepository
{

    public function createAddress($request)
    {
        $params = [
            "user_id" => $request["user_id"],
            "title" => $request["title"],
            "detail_address" => $request["detail_address"],
            "latidue" => @$request["latitude"],
            "longitude" => @$request["longitude"],
            "notes" => $request["notes"],
            "status" => !count($this->getAllAddressUserById($request["user_id"])) ? 1 : 0,
        ];

        return Address::create($params);
    }

    public function updateAddress($request) {
        $params = [
            "user_id" => $request["user_id"],
            "title" => $request["title"],
            "detail_address" => $request["detail_address"],
            "latidue" => @$request["latitude"],
            "longitude" => @$request["longitude"],
            "notes" => $request["notes"],
        ];
        $data = $this->getAddressById($request["id"]);
        $data->update($params);
        return $data;
    }

    public function getAddressById($addressId)
    {
        return Address::find($addressId);
    }

    public function getAllAddressUserById($userId)
    {
        return Address::where("user_id", $userId)->get();
    }
    
    public function getDefaultAddressUserByUserId($userId) {
        return Address::where("user_id", $userId)->where("status", 1)->first();
    }

    public function selectAddressById($addressId) {
        Address::where('id', '!=', $addressId)->update(["status" => 0]);
        $data = $this->getAddressById($addressId);
        $data->update(["status" => 1]);
        return $data;
    }
}
