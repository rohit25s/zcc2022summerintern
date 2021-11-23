<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic test to check home page availability.
     *
     * @return void
     */
    public function test_homepage_available()
    {
        $response = $this->get('http://127.0.0.1:8000');

        $response->assertStatus(200);
    }
}
