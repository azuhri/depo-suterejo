<?php


namespace App\Http\Services;

use App\Http\Repositories\TrashCategoryRepository;
use Exception;

class TrashCategoryService 
{
    public TrashCategoryRepository $trashCategoryRepo;
    public function __construct(
        TrashCategoryRepository $repo
    )
    {
        $this->trashCategoryRepo = $repo;
    }

    public function createOrUpdateTrashCategory($request) {
        return $this->trashCategoryRepo->createOrUpdateTrashCategory($request);
    }

    public function getCategoryById($id) {
        return $this->trashCategoryRepo->getTrashCategoryById($id);
    }

    public function getAllTrashCategory($orderBy = "id", $order = "DESC") {
        return $this->trashCategoryRepo->getAllTrashCategory($orderBy, $order);
    }

    public function deleteTrashCategoryById($id) {
        $findData = $this->trashCategoryRepo->getTrashCategoryById($id);

        if(!$findData)
            throw new Exception("Data kategori sampah tidak valid..");

        $findData->delete();
        return $findData;
    }

    public function editPathImageById($id, $path) {
        return $this->trashCategoryRepo->editPathImageById($id, $path);
    }
}
