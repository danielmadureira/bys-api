<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class AcceptAjaxOnly
 *
 * Makes sure the route only accepts Ajax requests.
 *
 * @package App\Http\Middleware
 */
class AcceptAjaxOnly
{

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->ajax()) {
            return response('Forbidden', 403);
        }

        return $next($request);
    }

}
