<?php

namespace App\Http\Services;

use App\Http\Repositories\TrashRepository;
use Exception;

class TrashService {
    public TrashRepository $trashRepo;
    public function __construct(
        TrashRepository $repo
    )
    {
        $this->trashRepo = $repo;
    }

    public function createOrUpdateSubTrash($request) {
        return $this->trashRepo->createOrUpdateSubTrash($request);
    }

    public function getTrashById($id) {
        return $this->trashRepo->getTrashById($id);
    }

    public function getAllTrash($orderBy, $order) {
        return $this->trashRepo->getAllTrash($orderBy, $order);
    }

    public function deleteTrashById($id) {
        return $this->trashRepo->deleteTrashById($id);
    }

    public function deleteTrashByCategoryId($id) {
        return $this->trashRepo->deleteTrashByCategoryId($id);
    }

    public function getDataTrashWithLimit($limit) {
        return $this->trashRepo->getDataTrashWithLimit($limit);
    }

}