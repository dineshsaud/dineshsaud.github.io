<?php

namespace App\Http\Middleware;

use Closure;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('auth') != null)
            return $next($request);

        return redirect('login')->with('status', 'Please log in to comment.');

        // return redirect()->back()->with('status', 'Unauthorized request !!!');
    }
}
