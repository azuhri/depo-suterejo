<?php

namespace App\Http\Controllers;

use App\Http\Services\FileManagementService;
use App\Http\Services\JsonServices;
use App\Http\Services\TrashCategoryService;
use App\Http\Services\TrashService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class DataTrashController extends Controller
{
    public FileManagementService $fileService;
    public TrashCategoryService $trashCategoryService;
    public TrashService $trashService;
    public JsonServices $json;

    public function __construct(
        FileManagementService $fileService,
        TrashCategoryService $trashCategoryService,
        TrashService $trashService,
        JsonServices $json
    ) {
        $this->fileService = $fileService;
        $this->trashCategoryService = $trashCategoryService;
        $this->trashService = $trashService;
        $this->json = $json;
    }

    public function newTrashCategory(Request $request)
    {
        try {
            if (!$request->hasFile("path_image"))
                throw new Exception("Maaf silahkan upload aset gambar");

            $request->validate([
                "name" => ["required", "max:50", "unique:trash_categories,name"],
                "path_image" => ["mimes:jpg,jpeg,png"],
            ], [
                "name.required" => "Silahkan isi kategori sampah baru...",
                "name.unique" => "Maaf nama kategori sampah sudah dibuat sebelumnya...",
                "path_image.required" => "Silahkan upload data aset gambar....",
                "path_image.mimes" => "Aset gambar harus berupa gambar (png, jpg, jpeg).."
            ]);


            $path = $this->fileService->storeFile(
                $request->file("path_image"),
                "dynamic_assets/data_sampah/",
                $request->name
            );

            $data = $this->trashCategoryService->createOrUpdateTrashCategory($request);
            $this->trashCategoryService->editPathImageById($data->id, $path);

            return $this->json->responseDataWithMessage($data, "Berhasil membuat kategori sampah baru...");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function updateTrashCategory(Request $request)
    {
        try {
            $request->validate([
                "id" => ["required", "numeric"],
                "name" => [
                    "required", "max:50",
                    Rule::unique('trash_categories')->ignore($request->id),
                ],
                "path_image" => $request->hasFile("path_image") ? ["mimes:jpg,jpeg,png"] : [],
            ], [
                "name.required" => "Silahkan isi kategori sampah baru...",
                "name.unique" => "Maaf nama kategori sampah sudah dibuat sebelumnya...",
                "path_image.required" => "Silahkan upload data aset gambar....",
                "path_image.mimes" => "Aset gambar harus berupa gambar (png, jpg, jpeg).."
            ]);

            $data = $this->trashCategoryService->createOrUpdateTrashCategory($request);

            if ($request->hasFile("path_image")) {
                $path = $this->fileService->storeFile(
                    $request->file("path_image"),
                    "dynamic_assets/data_sampah/",
                    $request->name
                );
                $this->fileService->destroyFile($data->path_image);
                $this->trashCategoryService->editPathImageById($data->id, $path);
            }


            return $this->json->responseDataWithMessage($data, "Berhasil ubdah kategori sampah...");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function getAllDataTrashCategory(Request $request)
    {
        $data = $this->trashCategoryService->getAllTrashCategory("id", "DESC");
        return $this->json->responseData($data);
    }

    public function deleteTrashCategory(Request $request)
    {
        try {
            $this->trashService->deleteTrashByCategoryId($request->id);
            $tempData = $this->trashCategoryService->deleteTrashCategoryById($request->id);
            $this->fileService->destroyFile($tempData->path_image);
            return $this->json->responseDataWithMessage(true, "Berhasil menghapus kategori sampah...");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function deleteTrash(Request $request)
    {
        try {
            $this->trashService->deleteTrashById($request->id);
            return $this->json->responseDataWithMessage(true, "Berhasil menghapus data sampah...");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function newSubTrash(Request $request)
    {
        try {
            $formatMinimumPrice = number_format($request->minimum_price, 0, ".", ".");
            $request->validate([
                "name" => ["required", "max:50"],
                "trash_category_id" => ["required", "numeric"],
                "minimum_price" => ["required", "min:1000", "numeric"],
                "maximum_price" => ["required", "min:{$request->minimum_price}", "numeric"],
            ], [
                "name.required" => "Nama sub sampah harus diisi ya",
                "minimum_price.required" => "Minimal harga harus diisi ya",
                "minimum_price.min" => "Minimal minimum harga harus Rp1000",
                "maximum_price.required" => "Maksimal harga harus diisi ya",
                "maximum_price.min" => "Minimal maksimal harga harus Rp{$formatMinimumPrice}, tidak boleh dibawah minimum harga",
            ]);
            $data = $this->trashService->createOrUpdateSubTrash($request);
            return $this->json->responseDataWithMessage($data, "Berhasil membuat data sub sampah baru....");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function updateSubTrash(Request $request)
    {
        try {
            $formatMinimumPrice = number_format($request->minimum_price, 0, ".", ".");
            $request->validate([
                "id" => ["required", "numeric"],
                "name" => ["required", "max:50"],
                "trash_category_id" => ["required", "numeric"],
                "minimum_price" => ["required", "min:1000", "numeric"],
                "maximum_price" => ["required", "min:{$request->minimum_price}", "numeric"],
            ], [
                "name.required" => "Nama sub sampah harus diisi ya",
                "minimum_price.required" => "Minimal harga harus diisi ya",
                "minimum_price.min" => "Minimal minimum harga harus Rp1000",
                "maximum_price.required" => "Maksimal harga harus diisi ya",
                "maximum_price.min" => "Minimal maksimal harga harus Rp{$formatMinimumPrice}, tidak boleh dibawah minimum harga",
            ]);
            $data = $this->trashService->createOrUpdateSubTrash($request);
            return $this->json->responseDataWithMessage($data, "Berhasil ubah data sub sampah....");
        } catch (\Throwable $th) {
            return $this->json->responseError($th->getMessage());
        }
    }

    public function getAllDataTrash(Request $request)
    {
        $data = $this->trashService->getDataTrashWithLimit($request->limit);

        return $this->json->responseData($data);
    }
}
