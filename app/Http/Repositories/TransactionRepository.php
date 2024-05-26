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

    public function getDataTransaction($filters = []) {
        $query = Transaction::with($filters["relations"] ?? []);

        if(array_key_exists("user_id", $filters)) {
            $query->where("user_id", $filters["user_id"]);
        }

        if(array_key_exists("order_number", $filters)) {
            $query->where("order_number", "like", "%{$filters['order_number']}%");
        }

        if(array_key_exists("order_date", $filters) && !empty($filters["order_date"])) {
            $query->where("order_date", date("Y-m-d H:i:s", \strtotime($filters["order_date"])));
        }

        if(\array_key_exists("status_transaction", $filters) && $filters["status_transaction"] != "*") {
            if($filters["status_transaction"] == "PAID") {
                $query->where("is_paid", 1);
            } else {
                $query->where("status_transaction", $filters["status_transaction"]);
            }
        }

        if(\array_key_exists("order_by", $filters) && \array_key_exists("sort_by", $filters)) {
            $query->orderBy($filters["order_by"], $filters["sort_by"]);
        } else {
            $query->orderBy("id","DESC");
        }

        return $query->get()->map(function ($data) {
            $clone = $data->toArray();
            $clone["order_date"] = date("d F Y", strtotime($data->order_date));
            $clone["created_at"] = date("d-m-Y H:i", strtotime($data->created_at));
            $clone["updated_at"] = date("d-m-Y H:i", strtotime($data->updated_at));
            return (object)$clone;
        });
    }
}
