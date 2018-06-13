<?php  namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Kami;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UCenterController extends Controller
{
	private $user;
	private $kami;
	private $common;
	public function __construct()
	{
		$this->user=new User();
		$this->kami=new Kami();
		$this->common=new CommonController();
		$this->keycode=new IndexController();
	}
	public function userList(Request$v_1)
	{
		
		$var_948=$this->user->get()->toArray();
		return view('admin.userlist',[userlist=>$var_948]);
	}
	public function editUser($v_2)
	{
		$var_950=$this->user->where(['user_id'=>$v_2])->first()->toArray();
		return view('admin.edituser',['user'=>$var_950]);
	}
	public function delUser(Request$v_3)
	{
		
		$var_953=$v_3->post('user_id');
		$var_954=$this->user->where(['user_id'=>$var_953])->delete();
		if($var_954)
		{
			return ['status'=>200,'msg'=>'删除成功'];
		}
		else
		{
			return ['msg'=>'删除失败'];
		}
	}
	public function userSet(Request$v_4)
	{
		
		return view('admin.userset');
	}
	private function makeKami()
	{
		$var_957='';
		$v_6='';
		$var_958='';
		$var_959=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
		for($var_960=0;$var_960<30;$var_960++)
		{
			$var_957.= $var_959[rand(0,25)];
		}
		$var_961=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		for($var_960=0;$var_960<30;$var_960++)
		{
			$v_6.= $var_961[rand(0,25)];
		}
		$var_962=$v_6.$var_957;
		$var_963=str_split($var_962);
		for($var_960=0;$var_960<count($var_963);
		$var_960++)
		{
			$var_958.= $var_963[rand(0,59)];
		}
		return $var_958;
	}
	public function viewKamiList(Request$var_132)
	{
		
		$var_966=['1天','1月','1年'];
		$var_967=$this->kami->get()->toArray();
		return view('admin.kamilist',['kamilist'=>$var_967,time=>$var_966]);
	}
	public function viewKami(Request$v_5)
	{
		
		return view('admin.makekami');
	}
	public function delKami(Request$v_6)
	{
		
		$var_972=$v_6->post('km_action');
		$var_973=$v_6->post('km_id');
		if($var_972=='')
		{
			$var_974=$this->kami->where(['km_id'=>$var_973])->delete();
			if($var_974)
			{
				return ['status'=>200,'msg'=>'删除成功'];
			}
			else
			{
				return ['msg'=>'删除失败'];
			}
		}
		switch($var_972)
		{
			case 0:$var_974=$this->kami->where(['km_status'=>1])->delete();
			if($var_974)
			{
				return ['status'=>200,'msg'=>'删除成功'];
			}
			else
			{
				return ['msg'=>'删除失败'];
			}
			break;
			case 1:$var_974=$this->kami->where(['km_status'=>0])->delete();
			if($var_974)
			{
				return ['status'=>200,'msg'=>'删除成功'];
			}
			else
			{
				return ['msg'=>'删除失败'];
			}
			break;
			case 2:$var_974=$this->kami->where('km_id','>=',0)->delete();
			if($var_974)
			{
				return ['status'=>200,'msg'=>'删除成功'];
			}
			else
			{
				return ['msg'=>'删除失败'];
			}
			break;
		}
	}
	public function kamisc(Request$v_7)
	{
		
		$var_976=$v_7->post('kmnum');
		$var_977=$v_7->post('datetype');
		$var_978=[];
		for($var_979=1;$var_979<=$var_976;$var_979++)
		{
			$var_980=$this->makeKami();
			$var_978[]=['km_time'=>$var_977,'km_num'=>$var_980,'km_create_time'=>time()];
		}
		$var_981=DB::table('kami')->insert($var_978);
		if($var_981)
		{
			return ['status'=>200,'data'=>$var_978];
		}
	}
}
?>