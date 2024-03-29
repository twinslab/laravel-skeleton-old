<?php

namespace App\Http\Middleware;

use Closure;

class RedirectTrailingSlashes
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
		if (preg_match('/.+\/$/', $request->getRequestUri())) {
			return redirect(rtrim($request->getRequestUri(), '/'), 301);
        }

		return $next($request);
	}
}
