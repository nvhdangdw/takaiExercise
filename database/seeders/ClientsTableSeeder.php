<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'id' => '0a6ad9c8-b200-4e60-9c7c-f2df5a334fb2',
            'username' => 'Client One',
            'api_token' => 'aH0dWvgmsZtug6IwlGxonXcjayTHIPvt',
            'password' => bcrypt('client@01')
        ]);

        Client::create([
            'id' => '701f47a4-e956-48b4-9752-b2790a38a34c',
            'username' => 'Client Two',
            'api_token' => 'c6alcdt7GUTprm5vpbKbLqMzdFtIRLRQ',
            'password' => bcrypt('client@02')
        ]);

        // Add more clients as needed...
    }
}
