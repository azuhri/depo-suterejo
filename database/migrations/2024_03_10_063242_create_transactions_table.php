<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("address_id")->index();
            $table->foreign("address_id")->references("id")->on("addresses");
            $table->string("order_number", 50)->index();
            $table->string("unique_code", 50)->index();
            $table->datetime("order_date")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string("status_transaction", 50)->index();
            $table->boolean("is_paid");
            $table->double("weight_kg");
            $table->integer("amount");
            $table->string("bank_name");
            $table->string("rekening_number");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
