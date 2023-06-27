<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        $isRedactor = Auth::check() and $user->isRedactor();
        $isAdmin = Auth::check() and $user->isAdmin();

        if (Auth::check() and (($isRedactor and $role == 'redactor') or $isAdmin))
            return $next($request);
        else
            return redirect()->to(RouteServiceProvider::MAIN);
    }
}
