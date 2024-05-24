<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WarehouseRouteMiddleware
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
//        session()->forget('warehouse');

        if(is_null(Session::get('warehouse'))) {
            if(is_null($request->get("restaurant"))) {
                return redirect('warehouse');
            }
            else {
                Session::put('warehouse', $request->get("restaurant"));
                return $next($request);
            }
        }

        return $next($request);
    }
}
