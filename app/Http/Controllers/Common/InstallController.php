<?php  namespace App\Http\Controllers\Common;
use App\Http\Controllers\Admin\adminLoginController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InstallController extends Controller
{
	private $write;
	private $admin;
	public function __construct()
	{
		$this->write=new WriteConfigController();
		$this->admin=new adminLoginController();
	}
	public function install(Request$v_1,$v_2=0)
	{
		$this->checkInstall();
		if($v_2==0)
		{
			return view('install.step_0');
		}
		elseif($v_2==1)
		{
			$var_1158=$this->jiance();
			return view('install.step_1',['info'=>$var_1158]);
		}
		elseif($v_2==2)
		{
			return view('install.step_2');
		}
		elseif($v_2==3)
		{
			$var_1159=$this->writeConfig($v_1);
			if(isset($var_1159))
			{
				file_put_contents(storage_path().'/app/public/install/install.lock',1);
				return view('install.step_3');
			}
		}
	}
	public function yzMysql(Request$v_3)
	{
		$this->checkInstall();
		$var_1012=$v_3->get('dbhost');
		$var_1160=$v_3->get('dbuser');
		$v_55=$v_3->get('dbpass');
		$var_1161=mysqli_connect($var_1012,$var_1160,$v_55);
		if($var_1161)
		{
			return ['status'=>200];
		}
		echo false;
		mysqli_close($var_1161);
	}
	public function writeConfig(Request$v_4)
	{
		$this->checkInstall();
		$var_1163=$v_4->post('dbhost');
		$var_1164=$v_4->post('dbname');
		$var_1165=$v_4->post('dbuser');
		$var_1166=$v_4->post('dbpwd');
		$var_433=$v_4->post('username');
		$var_1167=$v_4->post('password');
		$var_1168=['default'=>mysql,'connections'=>['sqlite'=>['driver'=>'sqlite','database'=>env('DB_DATABASE',database_path('database.sqlite')),'prefix'=>'',],mysql=>['driver'=>mysql,'host'=>$var_1163,'port'=>3306,'database'=>$var_1164,'username'=>$var_1165,'password'=>$var_1166,'unix_socket'=>env('DB_SOCKET',''),'charset'=>'utf8','collation'=>'utf8_unicode_ci','prefix'=>'','strict'=>true,'engine'=>null,],'pgsql'=>['driver'=>'pgsql','host'=>env('DB_HOST','127.0.0.1'),'port'=>env('DB_PORT',5432),'database'=>env('DB_DATABASE','forge'),'username'=>env('DB_USERNAME','forge'),'password'=>env('DB_PASSWORD',''),'charset'=>'utf8','prefix'=>'','schema'=>'public','sslmode'=>'prefer',],'sqlsrv'=>['driver'=>'sqlsrv','host'=>env('DB_HOST','localhost'),'port'=>env('DB_PORT',1433),'database'=>env('DB_DATABASE','forge'),'username'=>env('DB_USERNAME','forge'),'password'=>env('DB_PASSWORD',''),'charset'=>'utf8','prefix'=>'',],],'migrations'=>'migrations','redis'=>['client'=>'predis','default'=>['host'=>env('REDIS_HOST','127.0.0.1'),'password'=>env('REDIS_PASSWORD',null),'port'=>env('REDIS_PORT',6379),'database'=>0,],],];
		$var_1169=CONFIG_PATH.'database.php';
		$var_1170=$this->write->writeConfig($var_1168,$var_1169);
		if($var_1170=='ok')
		{
			$var_1171=$this->loadSQL($var_1163,$var_1164,$var_1165,$var_1166);
			if($var_1171)
			{
				$var_1172=new \mysqli($var_1163,$var_1165,$var_1166);
				if($var_1172)
				{
					$var_1173='update admin set admin_name=\''.$var_433.'\', admin_pass=\''.$this->admin->makepass($var_1167).'\' where admin_name=\'admin\'';
					$var_1172->query('use '.$var_1164.';');
					$var_1174=$var_1172->query($var_1173.';');
				}
				$var_1172->close();
				$var_1172=null;
				return $var_1174;
			}
		}
		else
		{
			exit('安装出错,请重试');
		}
	}
	private function loadSQL($v_5,$v_6,$v_7,$v_8)
	{
		$var_1176=file_get_contents(storage_path().'/app/public/install/freekan.sql');
		$var_1177=explode(';',$var_1176);
		$var_1178=new \mysqli($v_5,$v_7,$v_8);
		if($var_1178)
		{
			$var_1178->query('CREATE DATABASE IF NOT EXISTS '.$v_6.' DEFAULT CHARSET utf8 COLLATE utf8_unicode_ci;');
			$var_1178->query('use '.$v_6.';');
			foreach($var_1177 as $var_1179)
			{
				$var_1180=$var_1178->query($var_1179.';');
			}
		}
		$var_1178->close();
		$var_1178=null;
		return true;
	}
	private function jiance()
	{
		$var_1182=[mysqli_connect,curl_init,curl_multi_init];
		$var_1183=[];
		$var_1183['os']=PHP_OS;
		$var_1183['version']=PHP_VERSION;
		$var_1183['upsize']=get_cfg_var('upload_max_filesize');
		$var_1184=function_exists(gd_info)?gd_info():array();
		$var_1183['gd']=empty($var_1184['GD Version'])?'noext':$var_1184['GD Version'];
		if(function_exists(disk_free_space))
		{
			$var_1183['disk']=floor(disk_free_space('../')/(1024*1024)).'M';
		}
		else
		{
			$var_1183['disk']='unknow';
		}
		foreach($var_1182 as $var_1185)
		{
			if(function_exists($var_1185))
			{
				$var_1183['function'][$var_1185]='支持';
			}
			else
			{
				$var_1183['function'][$var_1185]='不支持';
				$var_1183['error']=1;
			}
		}
		return $var_1183;
	}
	private function checkInstall()
	{
		$var_1187=storage_path().'/app/public/install/install.lock';
		if(file_exists($var_1187))
		{
			echo '程序已安装,请直接打开使用<br>';
			echo '如需重新安装<br>';
			echo '请先删除storage/app/public/install/install.lock文件<br>';
			die();
		}
	}
}
?>