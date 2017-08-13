<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 8/12/2017
 * Time: 5:18 PM
 */

namespace App\Http\Middleware;

use Closure;
define('SESSION_USER_INFO','USER_INFO');
define('GROUP_ACCOUNTANT' , 'G03');

class AccountMiddleware
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

            //TODO: add 1 page loi de redirect
            if(strcmp($groupcd,GROUP_ACCOUNTANT) != 0){
                return redirect('AccessDeny');
            }
        }

        return $next($request);
    }
}