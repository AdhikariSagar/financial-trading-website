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
        Schema::create('metadata', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->nullable();
            $table->string('source')->nullable();
            $table->string('ticker')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('exchange')->nullable();
            $table->string('currency')->nullable();
            $table->string('countryName')->nullable();
            $table->string('countryIso')->nullable();
            $table->string('sector')->nullable();
            $table->string('industry')->nullable();
            $table->text('description')->nullable();
            $table->string('isin')->nullable();
            $table->string('primaryTicker')->nullable();
            $table->integer('fullTimeEmployees')->nullable();
            $table->date('updatedAt')->nullable();
            $table->string('cusip')->nullable();
            $table->string('logoURL')->nullable();
            $table->string('cik')->nullable();
            $table->string('employerIdNumber')->nullable();
            $table->string('fiscalYearEnd')->nullable();
            $table->date('ipoDate')->nullable();
            $table->string('validUntil')->nullable();
            $table->string('internationalDomestic')->nullable();
            $table->string('gicSector')->nullable();
            $table->string('gicGroup')->nullable();
            $table->string('gicIndustry')->nullable();
            $table->string('gicSubIndustry')->nullable();
            $table->string('addressDetails')->nullable();
            $table->string('phone')->nullable();
            $table->string('webUrl')->nullable();
            $table->string('category')->nullable();
            $table->text('fundSummary')->nullable();
            $table->string('fundFamily')->nullable();
            $table->string('fundFiscalYearEnd')->nullable();
            $table->string('exchangeMarket')->nullable();
            $table->string('fundCategory')->nullable();
            $table->string('fundStyle')->nullable();
            $table->string('homeCategory')->nullable();
            $table->boolean('isDelisted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadatas');
    }
};
