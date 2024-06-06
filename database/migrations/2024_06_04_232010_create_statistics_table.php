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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('metadata_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('explorer')->nullable();
            $table->decimal('maxSupply', 20, 8)->nullable();
            $table->decimal('lowAllTime', 20, 8)->nullable();
            $table->string('sourceCode')->nullable();
            $table->decimal('highAllTime', 20, 8)->nullable();
            $table->decimal('totalSupply', 20, 8)->nullable();
            $table->string('messageBoard')->nullable();
            $table->string('technicalDoc')->nullable();
            $table->decimal('circulatingSupply', 20, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
