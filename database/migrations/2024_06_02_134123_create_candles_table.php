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
        Schema::create('candles', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('dateTime');
            $table->float('startPrice');
            $table->float('highestPrice');
            $table->float('lowestPrice');
            $table->float('endPrice');
            $table->unsignedBigInteger('volume');
            $table->string('source');
            $table->string('candleType');
            $table->string('currency');
            $table->timestamps();

            // Add indexes if necessary
            $table->index('symbol');
            $table->index('dateTime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candles');
    }
};
