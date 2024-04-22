<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\InterfaceAddressRepository;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionRepository
{

    public function createNewTransaction($request)
    {
        // dd($request);
        $params = [
            "user_id" => $request["user_id"],
            "address_id" => $request["address_id"],
            "order_number" => "#ORDER-" . \date("dmYHis") . "-" . \strtoupper(Str::random(5)),
            "unique_code" => Str::random(12),
            "order_date" => $request["order_date"],
            "range_time" => $request["range_time"],
            "status_transaction" => "PENDING",
            "is_paid" => 0,
            "weight_kg" => $request["weight_kg"],
            "amount" => $request["amount"],
            "bank_name" => $request["bank_name"],
            "rekening_number" => $request["rekening_number"],
            "rekening_name" => $request["rekening_name"],
            "estimate_amount_minimum" => $request["estimate_amount_minimum"],
            "estimate_amount_maximum"  => $request["estimate_amount_maximum"],
        ];

        return Transaction::create($params);
    }
}
