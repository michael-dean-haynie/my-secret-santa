<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LoggedInMiddleware
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
				if (!Auth::check())
				{
					if (!($request->is('auth/login') or $request->is('auth/register')))
					{
						return redirect('/auth/login');
					}
				}
        return $next($request);
    }
}
