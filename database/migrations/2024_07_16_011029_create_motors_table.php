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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->integer('sap_id')->unique();
            $table->string('img')->nullable();
            $table->string('name');
            $table->string('tag_id');
            $table->unsignedBigInteger('location_id'); // Tambahkan kolom location_id
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade'); // Foreign key
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->float('ampere')->nullable();
            $table->float('power')->nullable();
            $table->string('front_bearing')->nullable();
            $table->string('rear_bearing')->nullable();
            $table->string('speed')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};