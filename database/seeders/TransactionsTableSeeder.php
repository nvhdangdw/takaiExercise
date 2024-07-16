<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clientId = DB::table('clients')->where('username', 'ClientOne')->value('id');

        DB::table('transactions')->insert([
            [
                'id' => (string) Str::uuid(),
                'date' => now()->subDays(1),
                'content' => 'Any text there',
                'amount' => 100.00,
                'type' => 'Deposit',
                'client_id' => $clientId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'date' => now()->subDays(2),
                'content' => 'Any text there',
                'amount' => -50.00,
                'type' => 'Withdraw',
                'client_id' => $clientId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'date' => now()->subDays(3),
                'content' => 'Another transaction',
                'amount' => 200.00,
                'type' => 'Deposit',
                'client_id' => $clientId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'date' => now()->subDays(4),
                'content' => 'Another transaction',
                'amount' => -70.00,
                'type' => 'Withdraw',
                'client_id' => $clientId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
