<?php

namespace App\Http\Middleware;

use App\Models\AuthModel;
use App\Models\CookieModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $login = 'yes')
    {
        if ($login == 'yes') {
            if (AuthModel::CheckSession()['bool']) {
                return $next($request);
            }
            return redirect('/')->with('error', 'Unauthorizeds');
        } else if ($login == 'no') {
            if (AuthModel::CheckSession()['bool']) {
                return $next($request);
            }
            return redirect('/')->with('error', 'Unauthorizeds');
        }
    }
}
