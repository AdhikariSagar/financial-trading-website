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
        Schema::create('mutual_fund_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('metadata_id')->constrained('metadata')->onDelete('cascade');
            $table->string('domicile')->nullable();
            $table->double('yield');
            $table->double('yield1YearYtd');
            $table->double('yield3YearYtd');
            $table->double('yield5YearYtd');
            $table->string('nav');
            $table->double('prevClosePrice');
            $table->double('expenseRatio');
            $table->double('portfolioNetAssets');
            $table->double('shareClassNetAssets');
            $table->date('expenseRatioDate')->nullable();
            $table->string('inceptionDate')->nullable();
            $table->string('morningStarRating')->nullable();
            $table->string('morningStarRiskRating')->nullable();
            $table->string('morningStarCategory')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutual_fund_details');
    }
};
