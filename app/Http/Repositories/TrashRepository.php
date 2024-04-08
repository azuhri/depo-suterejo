<?php

namespace App\Http\Repositories;

use App\Models\Trash;

class TrashRepository
{

    public function createOrUpdateSubTrash($request)
    {
        return Trash::updateOrCreate(
        ["id" => $request->id],
        [
            "name" => strtolower($request->name),
            "trash_category_id" => $request->trash_category_id,
            "minimum_price" => $request->minimum_price,
            "maximum_price" => $request->maximum_price,
        ]);
    }

    public function getTrashById($id)
    {
        return Trash::find($id);
    }

    public function getAllTrash($orderBy, $order)
    {
        return Trash::with(["category"])
            ->orderBy($orderBy, $order)
            ->get();
    }

    public function deleteTrashById($id)
    {
        return Trash::find($id)->delete();
    }

    public function deleteTrashByCategoryId($id)
    {
        return Trash::where("trash_category_id", $id)->delete();
    }

    public function getDataTrashWithLimit($limit = "*")
    {
        if ($limit != "*") {
            return Trash::with(["category"])->orderBy("id", "DESC")->limit($limit)->get();
        }

        return Trash::with(["category"])->orderBy("id", "DESC")->get();
    }
}
