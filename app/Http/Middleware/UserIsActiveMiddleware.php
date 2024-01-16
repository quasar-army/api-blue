<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserIsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        abort_if(
            $user && !$user->is_active,
            403,
            'Access denied. This account has been deactivated.'
        );

        return $next($request);
    }
}
