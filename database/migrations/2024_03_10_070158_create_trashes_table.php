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
        Schema::create('trashes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("trash_category_id")->index();
            $table->foreign("trash_category_id")->references("id")->on("trash_categories");
            $table->integer("minimum_price");
            $table->integer("maximum_price");
            $table->string("name", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trashes');
    }
};
