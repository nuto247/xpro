<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RefferalCodeChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->query('ref') && !empty($request->query('ref'))) {
            return redirect()->to('/')->withCookie(cookie()->forever('ref_code', $request->query('ref')));
        }

        return $next($request);

    }
}
