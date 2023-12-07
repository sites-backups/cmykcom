<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Config;

class TrailingSlashes
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

        if (!preg_match('/.+\/$/', $request->getRequestUri()))
        {
            // $base_url = 'http://127.0.0.1:8000';
            $base_url = 'https://customcmykboxes.com';
            return Redirect::to($base_url.$request->getRequestUri().'/');
        }

        return $next($request);
    }
}
