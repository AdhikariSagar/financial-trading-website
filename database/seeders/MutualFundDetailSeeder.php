<?php

namespace Database\Seeders;

use App\Models\Metadata;
use App\Models\MutualFundDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MutualFundDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // URL path to JSON file
        $jsonUrl = public_path('datasources\metadata.json');

        // Read JSON data
        $jsonData = file_get_contents($jsonUrl);
        // Decode JSON data into PHP array
        $data = json_decode($jsonData, true);
        foreach ($data['hits']['hits'] as $item) {
            $source = $item['_source'];
            $dataRecord = Metadata::where('symbol', $source['symbol'])->first();

            // Insert data into related 'mutual_fund_details' table
            if ($source['mutualFundDetails']) {
                MutualFundDetail::create([
                    'metadata_id' => $dataRecord->id,
                    'domicile' => $source['mutualFundDetails']['domicile'],
                    'yield' => $source['mutualFundDetails']['yield'],
                    'yield1YearYtd' => $source['mutualFundDetails']['yield1YearYtd'],
                    'yield3YearYtd' => $source['mutualFundDetails']['yield3YearYtd'],
                    'yield5YearYtd' => $source['mutualFundDetails']['yield5YearYtd'],
                    'nav' => $source['mutualFundDetails']['nav'],
                    'prevClosePrice' => $source['mutualFundDetails']['prevClosePrice'],
                    'expenseRatio' => $source['mutualFundDetails']['expenseRatio'],
                    'portfolioNetAssets' => $source['mutualFundDetails']['portfolioNetAssets'],
                    'shareClassNetAssets' => $source['mutualFundDetails']['shareClassNetAssets'],
                    'expenseRatioDate' => $source['mutualFundDetails']['expenseRatioDate'],
                    'inceptionDate' => $source['mutualFundDetails']['inceptionDate'],
                    'morningStarRating' => $source['mutualFundDetails']['morningStarRating'],
                    'morningStarRiskRating' => $source['mutualFundDetails']['morningStarRiskRating'],
                    'morningStarCategory' => $source['mutualFundDetails']['morningStarCategory'],
                ]);
            }
        }
    }
}
