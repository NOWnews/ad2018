<?php

namespace AD2018\Http\Middleware;

use Closure;

class CheckWhitelistIp
{
    const WHITELIST_IPS = ['61.219.7.80',
        '59.124.89.92',
        '127.0.0.1'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $clientIp = $request->ip();
        foreach (self::WHITELIST_IPS as $whiteIp) {
            if ($whiteIp == $clientIp) {
                return $next($request);
            }
        }

        return redirect('/');

    }
}
