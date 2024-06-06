<?php

namespace Database\Seeders;

use App\Models\IndexComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Metadata;
use App\Models\MarketCapitalization;
use App\Models\MarketCapitalizationBucket;
use App\Models\Statistic;

class MetadataSeeder extends Seeder
{
    public function run(): void
    {

        // URL path to JSON file
        $jsonUrl = public_path('datasources\metadata.json');

        // Read JSON data
        $jsonData = file_get_contents($jsonUrl);
        // Decode JSON data into PHP array
        $data = json_decode($jsonData, true);
        foreach ($data['hits']['hits'] as $item) {
            $dataRecord = Metadata::create([
                'symbol' => $item['_source']['symbol'],
                'source' => $item['_source']['source'],
                'ticker' => $item['_source']['ticker'],
                'code' => $item['_source']['code'],
                'type' => $item['_source']['type'],
                'name' => $item['_source']['name'],
                'exchange' => $item['_source']['exchange'],
                'currency' => $item['_source']['currency'],
                'countryName' => $item['_source']['countryName'],
                'countryIso' => $item['_source']['countryIso'],
                'sector' => $item['_source']['sector'],
                'industry' => $item['_source']['industry'],
                'description' => $item['_source']['description'],
                'isin' => $item['_source']['isin'],
                'primaryTicker' => $item['_source']['primaryTicker'],
                'fullTimeEmployees' => $item['_source']['fullTimeEmployees'],
                'updatedAt' => $item['_source']['updatedAt'],
                'cusip' => $item['_source']['cusip'],
                'logoURL' => $item['_source']['logoURL'],
                'cik' => $item['_source']['cik'],
                'employerIdNumber' => $item['_source']['employerIdNumber'],
                'fiscalYearEnd' => $item['_source']['fiscalYearEnd'],
                'ipoDate' => $item['_source']['ipoDate'],
                'validUntil' => $item['_source']['validUntil'],
                'internationalDomestic' => $item['_source']['internationalDomestic'],
                'gicSector' => $item['_source']['gicSector'],
                'gicGroup' => $item['_source']['gicGroup'],
                'gicIndustry' => $item['_source']['gicIndustry'],
                'gicSubIndustry' => $item['_source']['gicSubIndustry'],
                'addressDetails' => $item['_source']['addressDetails'],
                'phone' => $item['_source']['phone'],
                'webUrl' => $item['_source']['webUrl'],
                'category' => $item['_source']['category'],
                'fundSummary' => $item['_source']['fundSummary'],
                'fundFamily' => $item['_source']['fundFamily'],
                'fundFiscalYearEnd' => $item['_source']['fundFiscalYearEnd'],
                'isDelisted' => $item['_source']['isDelisted'],
            ]);

            // Insert data into related 'market_capitalization' table
            $marketCap = MarketCapitalization::create([
                'metadata_id' => $dataRecord->id,
                'value' => $item['_source']['marketCapitalization']['value'],
                'dominance' => $item['_source']['marketCapitalization']['dominance'],
                'diluted' => $item['_source']['marketCapitalization']['diluted'],
                'average' => $item['_source']['marketCapitalization']['average'],
            ]);

            // Insert data into related 'market_capitalization_bucket' table
            foreach ($item['_source']['marketCapitalization']['bucket'] as $bucket) {
                MarketCapitalizationBucket::create([
                    'market_capitalization_id' => $marketCap->id,
                    'category' => $bucket['category'],
                    'size' => $bucket['size'],
                    'categoryAverage' => $bucket['categoryAverage'],
                    'benchmark' => $bucket['benchmark'],
                    'portfolioPercent' => $bucket['portfolioPercent'],
                    'value' => $bucket['value'],
                ]);
            }

            foreach ($item['_source']['indexComponents'] as $indexComponent) {
                IndexComponent::create([
                    'metadata_id' => $dataRecord->id,
                    'code' => $indexComponent['code'],
                    'exchange' => $indexComponent['exchange'],
                    'name' => $indexComponent['name'],
                    'sector' => $indexComponent['sector'],
                    'industry' => $indexComponent['industry']
                ]);
            }

            if ($item['_source']['statistics']) {
                Statistic::create([
                    'metadata_id' => $dataRecord->id,
                    'explorer' => $item['_source']['statistics']['explorer'],
                    'maxSupply' => $item['_source']['statistics']['maxSupply'],
                    'lowAllTime' => $item['_source']['statistics']['lowAllTime'],
                    'sourceCode' => $item['_source']['statistics']['sourceCode'],
                    'highAllTime' => $item['_source']['statistics']['highAllTime'],
                    'totalSupply' => $item['_source']['statistics']['totalSupply'],
                    'messageBoard' => $item['_source']['statistics']['messageBoard'],
                    'technicalDoc' => $item['_source']['statistics']['technicalDoc'],
                    'circulatingSupply' => $item['_source']['statistics']['circulatingSupply']
                ]);
            }
        }
    }
}
