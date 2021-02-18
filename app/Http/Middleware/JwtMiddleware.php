<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    
            return response()->json([
                'error' => true, 
                'message' => 'Token is Expired', 
                'data' => ''],401);
    
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    
            return response()->json([
                'error' => true, 
                'message' => 'Token is Invalid', 
                'data' => ''],401);
    
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
    
            return response()->json([
                'error' => true, 
                'message' => 'Authorization Token not found', 
                'data' => ''],401);
    
        }
        
        return $next($request);
        
    }
}
