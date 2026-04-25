<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user sudah login, dan dia adalah Admin, maka lempar ke panel admin
        if ($user && $user->is_admin == 1) {
            return redirect()->to(Filament::getPanel('admin')->getUrl());
        }

        return $next($request);
    }
}
