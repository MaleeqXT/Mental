<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || 
            ($request->user() instanceof MustVerifyEmail && 
            !$request->user()->hasVerifiedEmail())) {
    
            // Log the user information for debugging
            \Log::info('User verification check:', [
                'user_id' => $request->user() ? $request->user()->id : null,
                'verified' => $request->user() ? $request->user()->hasVerifiedEmail() : null,
            ]);
    
        }
    
        return $next($request);
    }
    
}
