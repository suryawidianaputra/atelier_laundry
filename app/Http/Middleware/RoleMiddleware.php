<?php

namespace App\Http\Middleware;

use App\Models\AuthModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (AuthModel::CheckSession()['data']['role'] == $role) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Unauthorized');
    }
}
