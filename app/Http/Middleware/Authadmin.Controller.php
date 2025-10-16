<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (session('user_role') !== 'admin') {
            return redirect()->route('login')->withErrors(['auth' => 'Akses hanya untuk admin']);
        }

        return $next($request);
    }
}
