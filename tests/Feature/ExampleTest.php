<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        // Output the response for debugging
        $response->dump();

        // Check if there are any logs
        if (file_exists(storage_path('logs/laravel.log'))) {
            $logs = file_get_contents(storage_path('logs/laravel.log'));
            echo $logs;
        }

        $response->assertStatus(200);
    }
}
