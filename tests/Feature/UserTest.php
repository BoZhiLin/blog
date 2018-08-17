<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $authResponse = $this->json('POST', '/api/auth/login', ['email' => 'test@test.com', 'password' => 'secret']);
        
        $registerResponse = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->json('POST', '/api/register', ['name' => 'yes', 'email' => str_random(2).'@a.com', 'password' => 'secret']);    

        $authResponse->assertStatus(200);
        $registerResponse->assertStatus(200);
    }
}
