<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer("final_amount")->default(0);
            $table->double("final_weight_kg")->default(0);
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->double("final_weight_kg")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn("final_amount");
            $table->dropColumn("final_weight_kg");
        });

        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn("final_weight_kg");
        });
    }
};
