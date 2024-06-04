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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('ticker');
            $table->string('code');
            $table->string('isin')->nullable();
            $table->string('type');
            $table->string('wpkn')->nullable();
            $table->string('name');
            $table->string('nameLong')->nullable();
            $table->string('region')->nullable();
            $table->string('country');
            $table->string('currency');
            $table->string('figi')->nullable();
            $table->string('cik')->nullable();
            $table->string('lei')->nullable();
            $table->string('source');
            $table->string('operatingMIC');
            $table->string('codeExchange');
            $table->string('virtualExchange');
            $table->string('nameExchange');
            $table->boolean('isArtificialExchange');
            $table->string('segmentExchange')->nullable();
            $table->string('segmentNameExchange')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
