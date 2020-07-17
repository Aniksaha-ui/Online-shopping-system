<?php

namespace App\Http\Middleware;

use Closure;
use App\user;
class admin
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
            if($request->user() && $request->user()->user_role=="admin"){
                return $next($request);
        
            }
            if($request->user() && $request->user()->user_role=="user"){
            
               return back()->with('jsAlert', "No permission");
        
            }


            }
}
