<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        if(auth::check()){
            return $next($request);
        
        }else{
            if ($request->is('api/*')) {
                return response()->json(['error' => true, 'message' => 'Please Login', 'data' => ''],401);
            }
            return redirect()->route('login');
        }
    }
}
