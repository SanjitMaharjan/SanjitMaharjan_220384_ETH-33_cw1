<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->is_admin)
            {
                return $next($request);
            }
            else{
                return redirect(route('/'))->with('danger','You are not authorized to this page');
            }

        }
        else
        {
            return redirect(route('login'))->with('danger','login to access this website');

        }

        return $next($request);

    }

}
