<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientLoginHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clientId = DB::table('clients')->where('username', 'testuser')->value('id');

        DB::table('client_login_history')->insert([
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'login_time' => now()->subDays(1),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'login_time' => now()->subDays(2),
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'login_time' => now()->subDays(3),
                'ip_address' => '192.168.0.1',
                'user_agent' => 'Mozilla/5.0',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
