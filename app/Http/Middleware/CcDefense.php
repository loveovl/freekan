<?php
namespace App\Http\Middleware;

error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_NOTICE);
use App\Http\Controllers\Admin\IndexController;
use Closure;
class CcDefense
{
	public function handle($_var_0, Closure $_var_1)
	{
		$_var_2 = storage_path() . '/app/public/install/install.lock';
		if (!file_exists($_var_2)) {
			return redirect('/install');
		}
		if (config('ccset.is_cc')) {
			$_var_3 = config('ccset.cc_max_times');
			$_var_4 = config('ccset.cc_url_time');
			$_var_5 = config('ccset.cc_admin_ip');
			$_var_6 = $_var_0->server('HTTP_HOST');
			$_var_7 = $_var_0->server('REQUEST_URI');
			$_var_8 = 'http://' . $_var_6 . $_var_7;
			$_var_0->setTrustedProxies(array('10.32.0.1/16'));
			$_var_9 = $_var_0->getClientIp();
			if (in_array($_var_9, $_var_5)) {
				return $_var_1($_var_0);
			}
			$_var_10 = time();
			$_var_11 = $_var_10;
			if ($_var_0->session()->has('cc_lasttime')) {
				$_var_12 = $_var_0->session()->get('cc_lasttime');
				$_var_13 = $_var_0->session()->get('cc_times') + 1;
				$_var_0->session()->put('cc_times', $_var_13);
			} else {
				$_var_12 = $_var_11;
				$_var_13 = 1;
				$_var_0->session()->put('cc_times', $_var_13);
				$_var_0->session()->put('cc_lasttime', $_var_12);
			}
			if ($_var_11 - $_var_12 <= 0) {
				if ($_var_13 >= $_var_3) {
					file_put_contents(DATA_PATH . 'cclog.txt', $_var_9 . '--' . $_var_8 . '--' . $_var_13 . PHP_EOL, FILE_APPEND);
					header(sprintf('Location:%s', 'http://127.0.0.1'));
					exit('Access Denied');
				}
			} else {
				$_var_13 = 0;
				$_var_0->session()->put('cc_lasttime', time());
				$_var_0->session()->put('cc_times', $_var_13);
			}
		}
		return $_var_1($_var_0);
	}
}