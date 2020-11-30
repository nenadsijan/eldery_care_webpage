<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class adminBlock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
 public function handle($request, Closure $next)
    {   //1.user should be authenticated
        //2..user have to be admin
        if(Auth::user())
         {
            return $next($request);
           
       }
        else  {
            return redirect('/');
        
        }
    }
}
