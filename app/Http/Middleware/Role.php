<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole as Middleware;
use Symfony\Component\HttpFoundation\Response;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    { if ($request->user()->$role == User:: ROLE_SUPERADMIN) {
        return $next($request);
    }
    abort(401, 'This action is unauthorized.');
}
}
