<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IPRestrictionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedIPs = ['2405:201:201c:40d3:4e26:9250:9855:b3e9', '2405:201:201c:413e:811f:9380:aaa1:8498'];

        if (in_array($request->ip(), $allowedIPs)) {
            return $next($request);
        }

        abort(403, 'Unauthorized access. Your IP is not allowed.');
    }
}
