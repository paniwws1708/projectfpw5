<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $userRole = strtolower(trim((string) $request->user()->role));
        $allowedRoles = array_map('strtolower', $roles);

        if (!in_array($userRole, $allowedRoles, true)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
