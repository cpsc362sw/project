<?php

namespace App\Http\Middleware;

use Closure;

class isUser
{
    /**
     * Check if user is a user or not using the
     * isUser() function in User model.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->isUser()) {
            return redirect('/home');
        }
        return $next($request);
    }
}
