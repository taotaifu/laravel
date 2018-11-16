<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          //检测用户是否登录
		if(!auth()->check() || auth()->user()->is_admin != 1){
			return redirect()->route('home');
		}

		return $next($request);


    }
}
