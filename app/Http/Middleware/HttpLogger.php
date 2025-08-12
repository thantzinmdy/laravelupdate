<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('backend.http_logger')){
            global_request_log($request);
        }
        return $next($request);
    }
}
