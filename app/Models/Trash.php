<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "trash_category_id",
        "minimum_price",
        "maximum_price",
    ];

    public function category() {
        return $this->belongsTo(TrashCategory::class, "trash_category_id");
    }
}

