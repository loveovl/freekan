<?php  namespace App\Http\Middleware;
use Closure;
class CheckLogin
{
	public function handle($var_430,Closure$v_1)
	{
		if(!$var_430->session()->get('is_login')||!cache('token'))
		{
			return redirect('/'.(empty(config('webset.webdir'))?'admin':config('webset.webdir')).'login');
		}
		return $v_1($var_430);
	}
}
?>