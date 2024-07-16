<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Transaction;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{

    public function test_transaction_date_is_correctly_formatted()
    {

        // Create a client first
        $client = Client::factory()->create();

        $transaction = Transaction::create([
            'date' => '21/03/2020 10:20:11',
            'content' => 'Test Transaction',
            'amount' => 100,
            'type' => 'Deposit',
            'client_id' => $client->id,
        ]);

        $this->assertEquals('21/03/2020 10:20:11', $transaction->date);
    }
}

