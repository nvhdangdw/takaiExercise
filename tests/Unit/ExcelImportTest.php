<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TransactionsImport;

class ExcelImportTest extends TestCase
{

    public function test_valid_excel_file_import()
    {
        $filePath = storage_path('app/tests/valid_transactions.xlsx');
        Excel::fake();

        $response = $this->post('/import?api_token=your_api_token', [
            'file' => \Illuminate\Http\UploadedFile::fake()->create('valid_transactions.xlsx', 100, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
        ]);

        $response->assertSessionHas('success', 'Transactions imported successfully.');
        $this->assertDatabaseCount('transactions', 10); // Adjust count based on your test data
    }

    public function test_invalid_excel_file_import()
    {
        $response = $this->post('/import?api_token=your_api_token', [
            'file' => \Illuminate\Http\UploadedFile::fake()->create('invalid_file.txt', 100, 'text/plain'),
        ]);

        $response->assertStatus(401);
    }
}

