<?php

namespace App\Http\Middleware;

use Closure;
define('SESSION_USER_INFO','USER_INFO');
define('GROUP_RECEPTIONIST' , 'G02');

class ReceptionistMiddleware
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
        if ( !session()->has(SESSION_USER_INFO) ){
            return redirect('K001');
        }else{
            $groupcd = session()->get(SESSION_USER_INFO)->group_cd;


            if(strcmp($groupcd,str_pad(GROUP_RECEPTIONIST,7)) != 0){
                return redirect('AccessDeny');
            }
        }

        return $next($request);
    }
}
