<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clientId = DB::table('clients')->where('username', 'testuser')->value('id');

        DB::table('tokens')->insert([
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'token' => Str::random(60),
                'expires_at' => now()->addDays(7),
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'token' => Str::random(60),
                'expires_at' => now()->addDays(14),
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'client_id' => $clientId,
                'token' => Str::random(60),
                'expires_at' => now()->addDays(21),
                'created_at' => now(),
            ]
        ]);
    }
}
