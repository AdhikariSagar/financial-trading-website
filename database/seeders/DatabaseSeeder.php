<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Truncate the users table to avoid duplicate entries
        DB::table('users')->truncate(); 

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(CandleSeeder::class);
        $this->call(ExchangeSeeder::class);
        $this->call(MetadataSeeder::class);
        $this->call(MutualFundDetailSeeder::class);
    }
}
