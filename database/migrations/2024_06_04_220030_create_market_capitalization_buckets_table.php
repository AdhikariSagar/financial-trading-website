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
        Schema::create('market_capitalization_buckets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('market_capitalization_id');
            $table->foreign('market_capitalization_id')->references('id')->on('market_capitalizations')->onDelete('cascade');
            $table->string('category');
            $table->string('size');
            $table->float('categoryAverage');
            $table->float('benchmark');
            $table->float('portfolioPercent');
            $table->float('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_capitalization_buckets');
    }
};
