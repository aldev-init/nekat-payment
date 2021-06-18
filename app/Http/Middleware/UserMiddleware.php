<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::guard('admin')->user()->role != 'admin'){
        //     return redirect('/admin/beranda')->with('status','Anda Bukan User');
        // }
        return $next($request);
    }
}
