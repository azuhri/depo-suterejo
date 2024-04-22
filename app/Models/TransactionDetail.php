<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "trash_id",
        "transaction_id",
        "weight_kg",
        "created_at",
        "updated_at",
    ];
}
