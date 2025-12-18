<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * Jika user sudah login:
     * - role 'admin' diarahkan ke dashboard admin
     * - selain itu diarahkan ke halaman depan (guest)
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Kalau admin, masuk ke halaman admin
                if ($user && $user->role === 'admin') {
                    return redirect()->route('dashboard');
                }

                // Selain admin (customer/guest) tetap di area guest
                return redirect('/');
            }
        }

        return $next($request);
    }
}


