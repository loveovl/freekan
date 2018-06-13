<?php
namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Index\IndexController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CommonController extends Controller
{
	public function curl_get_sg($_var_0, $_var_1)
	{
		$_var_2 = array();
		$_var_3 = curl_multi_init();
		foreach ($_var_0 as $_var_4 => $_var_5) {
			$_var_6[$_var_4] = curl_init($_var_5);
			curl_setopt($_var_6[$_var_4], CURLOPT_TIMEOUT, $_var_1);
			curl_setopt($_var_6[$_var_4], CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
			curl_setopt($_var_6[$_var_4], CURLOPT_MAXREDIRS, 7);
			curl_setopt($_var_6[$_var_4], CURLOPT_NOBODY, 1);
			curl_setopt($_var_6[$_var_4], CURLOPT_HEADER, 0);
			curl_setopt($_var_6[$_var_4], CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($_var_6[$_var_4], CURLOPT_RETURNTRANSFER, 1);
			curl_multi_add_handle($_var_3, $_var_6[$_var_4]);
		}
		do {
			curl_multi_exec($_var_3, $_var_7);
		} while ($_var_7);
		foreach ($_var_0 as $_var_4 => $_var_5) {
			$_var_8[$_var_4] = curl_multi_getcontent($_var_6[$_var_4]);
			$_var_2[$_var_4] = curl_getinfo($_var_6[$_var_4], CURLINFO_EFFECTIVE_URL);
			curl_multi_remove_handle($_var_3, $_var_6[$_var_4]);
			curl_close($_var_6[$_var_4]);
		}
		curl_multi_close($_var_3);
		return $_var_2;
	}
	public function curl_get($_var_9)
	{
		$_var_10 = $_var_9;
		$_var_11 = 'http://www.360kan.com';
		$_var_12 = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36';
		$_var_13 = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4';
		$_var_14 = curl_init();
		curl_setopt($_var_14, CURLOPT_URL, $_var_10);
		curl_setopt($_var_14, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($_var_14, CURLOPT_USERAGENT, $_var_12);
		curl_setopt($_var_14, CURLOPT_HEADER, 0);
		$_var_15 = curl_exec($_var_14);
		curl_close($_var_14);
		return $_var_15;
	}
	public function curl_post($_var_16, $_var_17)
	{
		$_var_18 = curl_init();
		$_var_19 = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
		$_var_20 = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4';
		$_var_21 = 'http://www.rartxt.com';
		$_var_22 = 'csrftoken=NK9zWiHi1QGpvvSYDk9zEmFNXfJ77bj77ZmTaEla5JgHDe1Cgw2UJNHvs6qIvaJa; sessionid=z8nncax7og8b3x74fw8nt2svp6l89pqa';
		curl_setopt($_var_18, CURLOPT_URL, $_var_16);
		curl_setopt($_var_18, CURLOPT_HEADER, 0);
		curl_setopt($_var_18, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($_var_18, CURLOPT_USERAGENT, $_var_19);
		curl_setopt($_var_18, CURLOPT_POST, 1);
		$_var_23 = $_var_17;
		curl_setopt($_var_18, CURLOPT_POSTFIELDS, $_var_23);
		$_var_24 = curl_exec($_var_18);
		curl_close($_var_18);
		return $_var_24;
	}
	public function curl_get_dwz($_var_25)
	{
		$_var_26 = $_var_25;
		$_var_27 = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36';
		$_var_28 = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4';
		$_var_29 = curl_init();
		curl_setopt($_var_29, CURLOPT_URL, $_var_26);
		curl_setopt($_var_29, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($_var_29, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($_var_29, CURLOPT_USERAGENT, $_var_27);
		curl_setopt($_var_29, CURLOPT_HEADER, 0);
		$_var_30 = curl_exec($_var_29);
		curl_close($_var_29);
		return $_var_30;
	}
	public function readData($_var_31)
	{
		$_var_32 = file_get_contents(DATA_PATH . $_var_31 . '.json');
		$_var_33 = json_decode($_var_32, true);
		return $_var_33;
	}
	public function flushIndex(Request $_var_34, $_var_35 = '')
	{
		$_var_36 = new IndexController();
		if ($_var_35 == 'index') {
			$_var_36->index($_var_34, 'flush');
			return true;
		}
	}
	public function sq(Request $_var_37)
	{
		$_var_38 = $_var_37->server('HTTP_HOST');
	}
	public function saveHistory(Request $_var_41)
	{
		$_var_42 = strip_tags($_var_41->get('url'));
		$_var_43 = strip_tags($_var_41->get('img'));
		$_var_44 = strip_tags($_var_41->get('title'));
		$_var_45 = ['url' => $_var_42, 'img' => $_var_43, 'title' => $_var_44];
		if ($_var_41->hasCookie('history')) {
			$_var_46 = $_var_41->cookie('history');
			if (!in_array($_var_45, $_var_46)) {
				if (count($_var_46) >= 7) {
					array_shift($_var_46);
				}
				$_var_46[] = $_var_45;
				Cookie::queue('history', $_var_46, 60 * 24 * 7);
			}
		} else {
			$_var_47[] = $_var_45;
			Cookie::queue('history', $_var_47, 60 * 24 * 7);
		}
	}
	public function seacherCx($_var_48)
	{
		$_var_49 = DB::table('dydata')->where('dy_title', 'like', '%' . $_var_48 . '%')->get()->map(function ($_var_50) {
			return (array) $_var_50;
		})->toArray();
		return $_var_49;
	}
	public function filterQq($_var_51)
	{
		$_var_52 = 0;
		$_var_53 = 'http://' . config('webset.webdomin') . '/play/' . $_var_51 . '.html';
		$_var_54 = DB::table('tort')->where(['tort_addr' => $_var_53])->get()->map(function ($_var_55) {
			return (array) $_var_55;
		})->toArray();
		if ($_var_54) {
			$_var_52 = 1;
		}
		return $_var_52;
	}
	public function getTemDir()
	{
		$_var_56 = [];
		$_var_57 = opendir(TEMPLATE_PATH);
		if ($_var_57) {
			while ($_var_58 = readdir($_var_57)) {
				if ($_var_58 == '.' || $_var_58 == '..') {
					continue;
				}
				if (is_dir(TEMPLATE_PATH . $_var_58)) {
					$_var_56[] = $_var_58;
				}
			}
		}
		return $_var_56;
	}
	public function getJs($_var_59)
	{
		$_var_59 = trim($_var_59);
		$_var_60 = explode('
', $_var_59);
		$_var_61 = [];
		foreach ($_var_60 as $_var_62) {
			trim($_var_62);
			$_var_63 = explode('$', $_var_62);
			$_var_64['name'] = $_var_63[0];
			$_var_64['url'] = $_var_63[1];
			$_var_61[] = $_var_64;
		}
		return $_var_61;
	}
	public function navSort()
	{
		$_var_65 = DB::table('nav')->get()->map(function ($_var_66) {
			return (array) $_var_66;
		})->toArray();
		foreach ($_var_65 as $_var_67 => $_var_68) {
			$_var_69[$_var_67] = $_var_68['nav_sort'];
		}
		array_multisort($_var_69, SORT_DESC, $_var_65);
		return $_var_65;
	}
	public function Curl_http($_var_70, $_var_71)
	{
		$_var_72 = array();
		$_var_73 = curl_multi_init();
		foreach ($_var_70 as $_var_74 => $_var_75) {
			$_var_76[$_var_74] = curl_init($_var_75);
			curl_setopt($_var_76[$_var_74], CURLOPT_TIMEOUT, $_var_71);
			curl_setopt($_var_76[$_var_74], CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
			curl_setopt($_var_76[$_var_74], CURLOPT_MAXREDIRS, 7);
			curl_setopt($_var_76[$_var_74], CURLOPT_NOBODY, 0);
			curl_setopt($_var_76[$_var_74], CURLOPT_HEADER, 0);
			curl_setopt($_var_76[$_var_74], CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($_var_76[$_var_74], CURLOPT_RETURNTRANSFER, 1);
			curl_multi_add_handle($_var_73, $_var_76[$_var_74]);
		}
		do {
			curl_multi_exec($_var_73, $_var_77);
		} while ($_var_77);
		foreach ($_var_70 as $_var_74 => $_var_75) {
			$_var_72[$_var_74] = json_decode(curl_multi_getcontent($_var_76[$_var_74]), 1);
			curl_multi_remove_handle($_var_73, $_var_76[$_var_74]);
			curl_close($_var_76[$_var_74]);
		}
		curl_multi_close($_var_73);
		return $_var_72;
	}
	public function ccDefense(Request $_var_78)
	{
		$_var_79 = config('ccset.cc_max_times');
		$_var_80 = config('ccset.cc_url_time');
		$_var_81 = config('ccset.cc_admin_ip');
		$_var_82 = 'http://127.0.0.1';
		$_var_83 = $_var_78->getRequestUri();
		$_var_78->setTrustedProxies(array('10.32.0.1/16'));
		$_var_84 = $_var_78->getClientIp();
		if (in_array($_var_84, $_var_81)) {
			return true;
		}
		$_var_85 = time();
		$_var_86 = $_var_85;
		if ($_var_78->session()->has('cc_lasttime')) {
			$_var_87 = $_var_78->session()->get('cc_times') + 1;
			$_var_78->session()->put('cc_times', $_var_87);
		} else {
			$_var_88 = $_var_86;
			$_var_87 = 1;
			$_var_78->session()->put('cc_times', $_var_87);
			$_var_78->session()->put('cc_lasttime', $_var_88);
		}
		if ($_var_86 - $_var_88 <= 0) {
			if ($_var_87 >= $_var_79) {
				echo "请不要重复刷新!<script>setTimeout(function() {window.location.href = {$_var_83}}," . $_var_80 . ')</script>';
				exit;
			}
		} else {
			$_var_87 = 0;
			$_var_78->session()->put('cc_lasttime', $_var_88);
			$_var_78->session()->put('cc_times', $_var_87);
		}
	}
	public function getPageHtml($_var_89, $_var_90, $_var_91, $_var_92)
	{
		$_var_93 = 5;
		$_var_94 = '';
		$_var_89 = $_var_89 < 1 ? 1 : $_var_89;
		$_var_89 = $_var_89 > $_var_90 ? $_var_90 : $_var_89;
		$_var_90 = $_var_90 < $_var_89 ? $_var_89 : $_var_90;
		$_var_95 = $_var_89 - floor($_var_93 / 2);
		$_var_95 = $_var_95 < 1 ? 1 : $_var_95;
		$_var_96 = $_var_89 + floor($_var_93 / 2);
		$_var_96 = $_var_96 > $_var_90 ? $_var_90 : $_var_96;
		$_var_97 = $_var_96 - $_var_95 + 1;
		if ($_var_97 < $_var_93 && $_var_95 > 1) {
			$_var_95 = $_var_95 - ($_var_93 - $_var_97);
			$_var_95 = $_var_95 < 1 ? 1 : $_var_95;
			$_var_97 = $_var_96 - $_var_95 + 1;
		}
		if ($_var_97 < $_var_93 && $_var_96 < $_var_90) {
			$_var_96 = $_var_96 + ($_var_93 - $_var_97);
			$_var_96 = $_var_96 > $_var_90 ? $_var_90 : $_var_96;
		}
		if ($_var_89 > 1) {
			if (config('webset.webtemplate') == 'wapian') {
				$_var_94 .= '<li><a  title="上一页" href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . ($_var_89 - 1) . '.html' . '"">上一页</a></li>';
			} else {
				$_var_94 .= '<a  title="上一页" href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . ($_var_89 - 1) . '.html' . '"">上一页</a>';
			}
		}
		for ($_var_98 = $_var_95; $_var_98 <= $_var_96; $_var_98++) {
			if ($_var_98 == $_var_89) {
				if (config('webset.webtemplate') == 'wapian') {
					$_var_94 .= '<li><a style="background:#ff6651;"><font color="#fff">' . $_var_98 . '</font></a></li>';
				} else {
					$_var_94 .= '<a style="background:#ff6651;"><font color="#fff">' . $_var_98 . '</font></a>';
				}
			} else {
				if (config('webset.webtemplate') == 'wapian') {
					$_var_94 .= '<li><a href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . $_var_98 . '.html' . '">' . $_var_98 . '</a></li>';
				} else {
					$_var_94 .= '<a href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . $_var_98 . '.html' . '">' . $_var_98 . '</a>';
				}
			}
		}
		if ($_var_89 < $_var_96) {
			if (config('webset.webtemplate') == 'wapian') {
				$_var_94 .= '<li><a  title="下一页" href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . ($_var_89 + 1) . '.html' . '"">下一页</a></li>';
			} else {
				$_var_94 .= '<a  title="下一页" href="' . '/' . $_var_92 . '/' . $_var_91 . '/' . ($_var_89 + 1) . '.html' . '"">下一页</a>';
			}
		}
		return $_var_94;
	}
}