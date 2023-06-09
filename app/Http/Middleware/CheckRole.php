<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $user = auth()->guard('user')->user()) :
            return redirect()->route('login')->with('errMsg', 'Vui lòng đăng nhập');
        endif;

        if (! in_array($user->role, ['admin', 'nhanvien'])) :
            return redirect()->route('home')->with('msg', 'Khồng đủ quyền');
        endif;

        return $next($request);
    }
}
