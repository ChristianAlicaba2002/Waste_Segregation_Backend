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
        Schema::create('trash_collected', function (Blueprint $table) {
            $table->integer('collection_id')->primary()->autoIncrement();
            $table->integer('trash_binnie_id')->references('binnie_id')->on('waste_item')->onDelete('cascade');
            $table->integer('weightRecorded')->references('weightRecorded')->on('waste_item')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_collected');
    }
};
