<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExcelImportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients/{clientId}/transactions', [TransactionController::class, 'getTransactions']);


Route::get('/import', [ExcelImportController::class, 'showImportForm']);
Route::post('/import', [ExcelImportController::class, 'importExcel']);    
Route::get('/import/download-sample', [ExcelImportController::class, 'downloadSampleExcel']);