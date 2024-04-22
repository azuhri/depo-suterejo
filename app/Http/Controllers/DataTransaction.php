<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DataTransaction extends Controller
{
    public function getDatatable(Request $request) {
        $orderDate = date("Y-m-d", strtotime($request->orderDate));
        $status = $request->status;
        $limit = $request->limit;
    
        $transaction = Transaction::query()->with(["detail", "address", "assets","user"]);
        $transaction->where("order_date", "=", $orderDate);
    
        if($status != "*") {
            $transaction->where("status_transaction", $status);
        }
    
        if($limit != "*") {
            $transaction->limit($limit);
        }
    
        $transaction->orderBy("id", "ASC");
    
        return response()->json(["data" => $transaction->get()]);
    }
    
}
