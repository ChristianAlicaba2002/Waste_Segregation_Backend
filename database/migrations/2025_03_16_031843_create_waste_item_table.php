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
        Schema::create('waste_item', function (Blueprint $table) {
            $table->integer('item_id')->primary()->autoIncrement();
            $table->integer('category_id')->nullable();
            $table->integer('binnie_id');
            $table->integer('weightRecorded')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_item');
    }
};
