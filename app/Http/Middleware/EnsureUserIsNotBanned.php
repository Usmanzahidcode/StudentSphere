<?php

namespace App\Http\Middleware;

use App\Enums\User\UserStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsNotBanned {
    public function handle(Request $request, Closure $next): Response {
        if (auth()->check() && auth()->user()->status===UserStatus::BANNED) {
            auth()->logout();
            return redirect()->route('login.form')->with('error', 'Your account has been banned.');
        }

        return $next($request);

    }
}
