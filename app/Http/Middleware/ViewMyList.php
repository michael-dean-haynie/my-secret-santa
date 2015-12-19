<?php

namespace App\Http\Middleware;

use Closure;

class ViewMyList
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
				$path = (string)$request->path();
				//
				$group_id_s = strpos($path, 'group/') + 6;
				$group_id = substr($path, $group_id_s, 1);
				//
				$member_id = $path[strlen($path) - 1];
				//
				$user_id = auth()->user()->id;
				//
				if ($member_id == $user_id){
					return redirect(url('/group/' . $group_id));
				}
        return $next($request);
    }
}
