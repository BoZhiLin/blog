<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutMiddleware();
        
        $postResponse = $this->json('GET', '/api/post');

        $postResponse
            ->assertStatus(200)
            ->assertJson([
                'status' => 0
            ]);
    }
}
