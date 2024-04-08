<?php

namespace App\Http\Repositories;

use App\Models\TrashCategory;

class TrashCategoryRepository {

    public function createOrUpdateTrashCategory($request) {
        return TrashCategory::updateOrCreate(
        ["id" => $request->id],
        [
            "name" => $request->name,
            // "path_image" => $request->path_image
        ]);
    }

    public function getTrashCategoryById($id) {
        return TrashCategory::find($id);
    }

    public function getAllTrashCategory($orderBy, $order) {
        return TrashCategory::with(["trashes"])
                ->orderBy($orderBy, $order)
                ->get();
    }

    public function deleteTashCategoryById($id) {
        return TrashCategory::find($id)->delete();
    }
    
    public function editPathImageById($id, $path) {
        return TrashCategory::where("id", $id)
                ->update([
                    "path_image" => $path,
                ]);
    }
}