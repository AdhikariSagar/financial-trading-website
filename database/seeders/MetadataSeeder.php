<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = public_path('datasources\metadata.json');
        // Check if the file exists
        if (file_exists($jsonFilePath)) {
            // Read JSON data from file
            $jsonData = file_get_contents($jsonFilePath);
            
            // Decode the JSON data
            $data = json_decode($jsonData, true);

            // Check if JSON decoding was successful and if hits array exists
            if ($data !== null && is_array($data) && isset($data['hits']['hits'])) {
                // Loop through each hit
                foreach ($data['hits']['hits'] as $hit) {
                    // Check if _source array exists
                    if (isset($hit['_source'])) {
                        // Create a new Exchange model instance
                        dd($hit['_source']);
                        /* $exchange = new Exchange();
                        // Fill the model with values from _source array
                        $exchange->fill($hit['_source']);
                        // Save the model to the database
                        $exchange->save(); */
                    } else {
                        echo "Missing '_source' array in hit.\n";
                    }
                }
            } else {
                echo "Error decoding JSON data or hits array not found.\n";
            }
        } else {
            echo "JSON file not found.\n";
        }
    
    }
}
