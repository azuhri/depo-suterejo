<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "path_image",
        "created_at",
        "updated_at",
    ];

    public function trashes() {
        return $this->hasMany(Trash::class, "trash_category_id");
    }
}
