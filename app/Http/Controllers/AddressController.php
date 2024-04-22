<?php

namespace App\Http\Controllers;

use App\Http\Services\AddressService;
use App\Http\Services\FileManagementService;
use App\Http\Services\JsonServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public JsonServices $json;
    public AddressService $addressService;
    public function  __construct(
        JsonServices $json,
        AddressService $address
    ) {
        $this->json = $json;
        $this->addressService = $address;
    }
    function createOrUpdateAddress(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                "detail_address" => ["required", "min:10"],
                "title" => ["required", "max:30", "min:5"],
                "latitude" => ["numeric"],
                "longitude" => ["numeric"],
            ], [
                "detail_address.required" => "Detail alamat wajib diisi..",
                "detail_address.min" => "Maaf detail alamat Anda terlalu singkat...",
                "title.min" => "Maaf label alamat Anda terlalu singkat...",
                "title.max" => "Maaf label alamat Anda terlalu panjang...",
                "title.required" => "Label alamat wajib diisi..",
            ]);

            $params = $request->toArray();
            $params["user_id"] = Auth::user()->id;
            if ($request->id) {
                $this->addressService->updateAddress($params);
                $allAddress = $this->addressService->getAllAddressUserById(Auth::user()->id);
                $allAddress = $allAddress->sortByDesc("status");
                $allAddress = $allAddress->values()->all();
                $html = view(
                    "app.landingpage.partials.address.group-list",
                    ["addresses" => $allAddress]
                )->render();
                return $this->json->responseDataWithMessage($html, "Berhasil menyimpan perubahan data alamat");
            }
            $data = $this->addressService->createAddress($params);
            $data->list_address_html = view("app.landingpage.partials.address.list-address", ["data" => $data])->render();
            return $this->json->responseDataWithMessage($data, "Berhasil membuat data alamat baru");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function deleteAddress(Request $request)
    {
        try {
            $address = $this->addressService->deleteAddressById($request->address_id);
            return $this->json->responseDataWithMessage($address, "Berhasil menghapus data alamat");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function selectAddress(Request $request)
    {
        try {
            $data = $this->addressService->selectAddress($request->address_id);
            $allAddress = $this->addressService->getAllAddressUserById(Auth::user()->id);
            $allAddress = $allAddress->sortByDesc("status");
            $allAddress = $allAddress->values()->all();
            $html =  view(
                "app.landingpage.partials.address.group-list",
                ["addresses" => $allAddress]
            )->render();
            $htmlAddressDefault =  view("app.landingpage.partials.address.address-container", ["data" => $data])->render();
            return $this->json->responseData([
                "data" => $data,
                "html" => $html,
                "html_address_default" => $htmlAddressDefault,
            ]);
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }
}
