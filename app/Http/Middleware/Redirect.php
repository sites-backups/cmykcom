<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Redirect
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
        $url = url()->current();
        if (strpos($url, 'http:') !== false) {
            $url2 = str_ireplace("http:","https:",$url);
            return redirect($url2);
        }
        $urlHttp = url()->current();
            if (strpos($urlHttp, 'http://www.') !== false) {
                $urlHttp2 = str_ireplace("http://www.","https://",$urlHttp);
                return redirect($urlHttp2);
        }
        $urlHttps = url()->current();
            if (strpos($urlHttp, 'https://www.') !== false) {
                $urlHttps2 = str_ireplace("https://www.","https://",$urlHttp);
                return redirect($urlHttps2);
        }
        return $next($request);
    }
}
