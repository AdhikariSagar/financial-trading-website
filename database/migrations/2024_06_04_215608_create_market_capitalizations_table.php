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
        Schema::create('market_capitalizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metadata_id');
            $table->foreign('metadata_id')->references('id')->on('metadata')->onDelete('cascade');
            $table->float('value');
            $table->float('dominance');
            $table->float('diluted');
            $table->float('average');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_capitalizations');
    }
};
