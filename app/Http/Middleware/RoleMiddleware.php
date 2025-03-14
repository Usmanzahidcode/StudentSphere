<?php

namespace App\Http\Middleware;

use App\Enums\User\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware {
    public function handle(Request $request, Closure $next, string $role): Response {
        if (!$request->user() || !$request->user()->hasRole(UserRole::from($role))) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
