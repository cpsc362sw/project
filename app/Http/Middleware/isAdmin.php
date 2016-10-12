<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Check if user is an admin or not using the
     * isAdmin() function in User model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isAdmin()) {
            return redirect('/home');
        }
        return $next($request);
    }
}
