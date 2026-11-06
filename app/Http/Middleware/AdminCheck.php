<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = 'admin'): Response
    {
        if (!auth()->check()) {
            abort(403, 'A tartalom megtekintéséhez be kell jelentkezned.');
        }
        if ($role === 'admin' && auth()->user()->role != 1) {
            abort(403, 'Erre az oldalra csak adminisztrátorok léphetnek be.');
        }
        return $next($request);
    }
}
