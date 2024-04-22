<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "title",
        "status",
        "user_id",
        "detail_address",
        "notes",
        "latidue",
        "longitude",
        "created_at",
        "updated_at",
    ];
}
