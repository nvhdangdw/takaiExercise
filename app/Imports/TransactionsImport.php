<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Session;

class TransactionsImport implements ToModel, WithBatchInserts, WithStartRow
{
    /**
     * Create a new transaction model instance.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Fetch the client_id from the session
        $clientId = Session::get('client_id');
        return new Transaction([
            'date' => $row[0],
            'content' => $row[1],
            'amount' => $row[2],
            'type' => $row[3],
            'client_id' => $clientId,
        ]);
    }

    /**
     * Specify batch size for inserts.
     *
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * Specify the starting row for data (skipping headers).
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust the chunk size as needed
    }
}
