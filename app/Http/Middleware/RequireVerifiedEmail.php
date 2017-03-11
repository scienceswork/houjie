<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RequireVerifiedEmail
{
    /**
     * Handle an incoming request.
     * 判断邮箱是否激活
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 必须登录并且邮箱已经验证
        if (Auth::check() && !Auth::user()->verified) {
            return redirect(route('email-verification-required'));
        }
        return $next($request);
    }
}
