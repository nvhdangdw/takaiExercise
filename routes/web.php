<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Middleware\AuthenticateClient;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

// Client Authentication Routes
Route::get('client/login', [ClientController::class, 'showLoginForm'])->name('client.login');
Route::post('client/login', [ClientController::class, 'login']);
Route::post('client/logout', [ClientController::class, 'logout'])->name('client.logout');


// Protected Routes
Route::middleware(AuthenticateClient::class)->group(function () {
    Route::post('/import', [ExcelImportController::class, 'importExcel']);
    Route::get('/import', [ExcelImportController::class, 'showImportForm']);
    Route::get('/clients/transactions', [TransactionController::class, 'getTransactions']);
});

// Sample Excel Download Route
Route::get('/import/download-sample', [ExcelImportController::class, 'downloadSampleExcel']);
