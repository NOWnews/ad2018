<?php

namespace AD2018\Http\Middleware;

use Closure;

class CheckWhitelistIp
{
    const WHITELIST_IPS = ['61.219.7.80','220.136.42.99','61.219.7.81',
        '59.124.89.92',
        '127.0.0.1',
	'61.216.80.97',
	'61.216.80.98',
	'61.216.80.99',
	'61.216.80.100',
	'61.216.80.101',
	'61.216.80.102',
	'219.70.206.8',
	'223.140.187.212'
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
	//20190709 集團設定vpn測試，先不擋ip

        $clientIp = $request->ip();
        foreach (self::WHITELIST_IPS as $whiteIp) {
            if ($whiteIp == $clientIp) {
                return $next($request);
            }
        }

        return redirect('/');


//	return $next($request);

    }
}
