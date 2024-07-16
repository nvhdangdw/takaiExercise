<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientAuthTest extends TestCase
{

    public function test_client_can_login_with_valid_credentials()
    {
        // Create a client first
        $client = Client::factory()->create();

        $response = $this->post('/client/login', [
            'username' => $client->username,
            'password' => $client->password,
        ]);

        $response->assertStatus(302);
    }

    public function test_client_cannot_login_with_invalid_credentials()
    {
        // Create a client first
        $client = Client::factory()->create();

        $response = $this->post('/client/login', [
            'username' => $client->username,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(302);
        $this->assertGuest();
    }
}

