<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/2/27
 * Time: 17:49
 */

namespace App\Http\Middleware;

use Closure;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->get('user_login')) {
            return redirect('/userlogin.html');
        }
        return $next($request);
    }

}