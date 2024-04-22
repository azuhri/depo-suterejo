<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "address_id",
        "order_number",
        "unique_code",
        "order_date",
        "range_time",
        "status_transaction",
        "is_paid",
        "weight_kg",
        "amount",
        "bank_name",
        "rekening_number",
        "rekening_name",
        "estimate_amount_minimum",
        "estimate_amount_maximum",
        "created_at",
        "updated_at",
    ];

    public function detail() {
        return $this->hasMany(TransactionDetail::class, "transaction_id");
    }

    public function assets() {
        return $this->hasMany(AssetTransaction::class, "transaction_id");
    }

    public function address() {
        return $this->belongsTo(Address::class, "address_id");
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
