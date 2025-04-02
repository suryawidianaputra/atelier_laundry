<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AuthModel;

class CheckCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_data = AuthModel::CheckCookie()['data'];
        if ($user_data['role'] && $user_data['user_id']) {
            session(['user_data' => $user_data]);
        }

        return $next($request);
    }
}
