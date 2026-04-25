<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIntern
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user sudah login, dan dia BUKAN Admin (is_admin = 0), dilempar ke panel intern
        if ($user && $user->is_admin == 0) {
            return redirect()->to(Filament::getPanel('intern')->getUrl());
        }

        return $next($request);
    }
}
