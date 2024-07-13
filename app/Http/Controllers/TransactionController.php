<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of transactions for a specific client.
     *
     * @param  string  $clientId
     * @return \Illuminate\Http\Response
     */
    public function getTransactions($clientId)
    {
        $transactions = Transaction::where('client_id', $clientId)->get();

        return response()->json($transactions);
    }
}
