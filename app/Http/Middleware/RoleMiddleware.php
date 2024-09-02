<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    { $guard = Auth::guard();
        $user = $guard->user();

        if (!$user || !in_array($user->role, $roles)) {
            return redirect('/'); // Redirect or abort with a 403 response
        }

        return $next($request);
    }
}