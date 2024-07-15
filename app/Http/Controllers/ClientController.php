<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function showLoginForm()
    {
        return view('client.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $client = Client::where('username', $request->username)->first();
        if ($client && Hash::check($request->password, $client->password)) {
            Session::put('client', $client);
            return redirect()->intended('import'); // Redirect to a dashboard or intended route
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Session::forget('client');
        return redirect()->route('client.login');
    }
}
