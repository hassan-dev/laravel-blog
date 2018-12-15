<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Status
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
        if(Auth::user()->id != "1") {

            Session::flash('warning', 'You can\'t perform this action');
            return redirect()->back();
        }else

        return $next($request);
    }
}
