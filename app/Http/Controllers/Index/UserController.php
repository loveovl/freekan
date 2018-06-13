<?php  namespace App\Http\Controllers\Index;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckPass;
use App\Http\Requests\KamiPost;
use App\Http\Requests\LoginPost;
use App\Http\Requests\RegisterPost;
use App\Kami;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
	private $user;
	private $history;
	private $kami;
	private $common;
	public function __construct()
	{
		$this->user=new User();
		$this->history=new IndexController();
		$this->kami=new Kami();
		$this->common=new CommonController();
	}
	public function viewRegister(Request$var_422)
	{
		
		if($var_422->session()->get('user_login'))
		{
			return redirect('/');
		}
		return view('user.userregister');
	}
	public function viewLogin(Request$v_1)
	{
		
		if($v_1->session()->get('user_login'))
		{
			return redirect('/');
		}
		return view('user.userlogin');
	}
	public function viewUCenter(Request$v_2)
	{
		
		$var_681=$v_2->session()->get('username');
		$var_682=$this->user->where(['user_name'=>$var_681])->first()->toArray();
		$var_683=$var_682['user_vip_time'];
		if(!empty($var_683)&& $var_683>time())
		{
			$var_684=$var_682['user_level'];
		}
		elseif(!empty($var_683)&& $var_683<time())
		{
			$this->user->where(['user_name'=>$var_681])->update(['user_level'=>0]);
			$var_682=$this->user->where(['user_name'=>$var_681])->first()->toArray();
			$var_684=$var_682['user_level'];
		}
		else
		{
			$var_684=$var_682['user_level'];
		}
		$var_685=date('Y-m-d',$var_682['user_create_date']);
		$var_686=$this->history->getHistroy($v_2);
		return view('user.index',['userlevel'=>$var_684,'usercreate'=>$var_685,'etime'=>$var_683,'history'=>$var_686]);
	}
	public function viewChangeInfo()
	{
		return view('user.userinfo');
	}
	public function changePass(CheckPass$v_3)
	{
		
		$var_687=$v_3->post();
		$var_347=$v_3->session()->get('username');
		$var_688=$var_687['olduser_pass'];
		$var_689=$var_687['newuser_pass'];
		$var_690=$this->user->where(['user_name'=>$var_347,'user_pass'=>md5($var_688)])->first()->toArray();
		if(!empty($var_690))
		{
			$var_691=$this->user->where(['user_name'=>$var_347])->update(['user_pass'=>md5($var_689)]);
			if($var_691)
			{
				return json_encode(['status'=>200,'msg'=>'修改成功']);
			}
			else
			{
				return json_encode(['msg'=>'修改失败']);
			}
		}
		else
		{
			return json_encode(['msg'=>'原密码错误']);
		}
	}
	public function register(RegisterPost$v_4)
	{
		
		$var_693=$v_4->post();
		$var_694=$this->user->where(['user_name'=>$var_693['user_name']])->first();
		$var_695=$this->user->where(['user_email'=>$var_693['user_email']])->first();
		if(!empty($var_694))
		{
			$var_696=['msg'=>'已存在相同用户'];
			return json_encode($var_696);
		}
		elseif(!empty($var_695))
		{
			$var_696=['msg'=>'已存在相同邮箱'];
			return json_encode($var_696);
		}
		unset($var_693['user_repass']);
		foreach($var_693 as $var_697=>$var_698)
		{
			$this->user->$var_697=$var_698;
		}
		$var_699=$this->user->save();
		if($var_699)
		{
			$var_696=['status'=>200,'msg'=>'注册成功'];
			return json_encode($var_696);
		}
	}
	public function login(LoginPost$v_5)
	{
		
		$var_701=$v_5->post();
		$var_702=$this->user->where(['user_name'=>$var_701['user_name'],'user_pass'=>md5($var_701['user_pass'])])->first();
		if(!empty($var_702))
		{
			$v_5->session()->put('user_login',1);
			$v_5->session()->put('username',$var_701['user_name']);
			$var_703=['status'=>200,'msg'=>'登录成功'];
			return json_encode($var_703);
		}
		else
		{
			$var_703=['msg'=>'用户名或者密码错误'];
			return json_encode($var_703);
		}
	}
	public function loginOut(Request$v_6)
	{
		$v_6->session()->forget('user_login');
		$v_6->session()->forget('username');
		return redirect('/userlogin.html');
	}
	public function viewPay(Request$v_7)
	{
		
		return view('user.chongzhi');
	}
	public function pay(KamiPost$v_8)
	{
		
		$var_706=$v_8->post(key);
		$var_707=$v_8->session()->get('username');
		$var_708=$this->kami->where(['km_status'=>0,'km_num'=>$var_706])->first();
		$var_458=$this->user->where(['user_name'=>$var_707])->first()->toArray();
		if($var_708)
		{
			$var_709=$var_708->toArray();
			$var_710=$var_709['km_time'];
			$var_711=$var_458['user_level'];
			switch($var_711)
			{
				case 0:$var_712=time();
				break;
				case 1:$var_712=$var_458['user_vip_time'];
				break;
			}
			switch($var_710)
			{
				case 0:$var_713=strtotime('+1 day',$var_712);
				break;
				case 1:$var_713=strtotime('+1 month',$var_712);
				break;
				case 2:$var_713=strtotime('+1 year',$var_712);
				break;
			}
			$var_714=$this->kami->where(['km_status'=>0,'km_num'=>$var_706])->update(['km_status'=>1,'km_used_mem'=>$var_707]);
			$var_715=$this->user->where(['user_name'=>$var_707])->update(['user_level'=>1,'user_vip_time'=>$var_713]);
			if($var_714&& $var_715)
			{
				return ['status'=>200,'msg'=>'充值成功'];
			}
			else return ['status'=>400,'msg'=>'充值失败'];
		}
		else return ['msg'=>'卡密不存在'];
	}
}
?>