<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticateClientTest extends TestCase
{

    public function test_authenticated_client_can_access_protected_route()
    {
        $client = Client::where('username','ClientOne')->first();

        $response = $this->get('/import?api_token=' . 'aH0dWvgmsZtug6IwlGxonXcjayTHIPvt');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_client_cannot_access_protected_route()
    {
        $response = $this->get('/import');

        $response->assertStatus(401);
    }
}

