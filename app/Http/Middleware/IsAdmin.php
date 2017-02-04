<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @param string                    $type
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $type = 'admin')
    {
        $user = $request->user();

        if ( $user && $user->admin($type) ) {
            return $next($request);
        }

        return redirect()->back();
    }
}
