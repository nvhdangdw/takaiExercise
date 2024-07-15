<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthenticateClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {       
            $client = Session::get('client');
            if (!$client) {
                //authorize client with api token
                $apiToken = $request->query('api_token');
                
                Log::info('API Token: ' . $apiToken);

                if (!$apiToken) {
                    
                    Log::error('Unauthorized - missing client_id or api_token');
                    return response()->json(['message' => 'Unauthorized - missing client_id or api_token'], 401);
                }

                $client = Client::where('api_token', $apiToken)->first();
                if(!$client){
                    Log::error('Unauthorized - invalid client_id or api_token');
                    return response()->json(['message' => 'Unauthorized'], 401);
                } else {
                    Session::put('client', $client);
                }
            }

            // Attach client to the request
            $request->request->add(['client_id' => $client->id]);
        
        return $next($request);
    }
}
