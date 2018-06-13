<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/24
 * Time: 14:54
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Cache;

class CheckToken
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
        $clientToken = $request->header('token');
        $serverToken = cache('token');
        if(empty($serverToken)||$clientToken!=$serverToken){
            //清空session
            $request->session()->forget('adminname');
            $request->session()->forget('is_login');
            Cache::forget('token');
            return redirect('/'.(empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')).'/token');

        }
        return $next($request);
    }

}