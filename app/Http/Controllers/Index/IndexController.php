<?php  namespace App\Http\Controllers\Index;
use App\Banner;
use App\DyData;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;
use App\LiveData;
use App\User;
use App\YqLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class IndexController extends Controller
{
	private $core;
	private $common;
	private $jk;
	private $fenlei;
	private $newlist;
	private $yqlist;
	private $bannerlist;
	private $nav;
	private $user;
	private $dydata;
	private $banner;
	private $zbdata;
	private $yqlink;
	private $viplist;
	private $playtype=['zhilian' =>"\xe7\x9b\xb4\xe9\x93\xbe\xe6\x92\xad\xe6\x94\xbe\xe6\xba\x90",'mp4' =>"MP4\xe6\x92\xad\xe6\x94\xbe\xe6\xba\x90",'m3u8' =>"M3U8\xe6\x92\xad\xe6\x94\xbe\xe6\xba\x90"];
	public function __construct()
	{
		$var_871=storage_path().'/app/public/install/install.lock';
		if(!file_exists($var_871))
		{
			return redirect('/install');
		}
		$this->dydata=new DyData();
		$this->banner=new Banner();
		$this->zbdata=new LiveData();
		$this->yqlink=new YqLink();
		$this->core=new CoreController();
		$this->common=new CommonController();
		$this->jk=config('jkset');
		$this->fenlei=config('fenlei');
		$this->viplist=$this->dydata->where('dy_id','>',0)->orderBy('dy_sort','desc')->get()->toArray();
		$this->yqlist=$this->yqlink->all()->toArray();
		$this->bannerlist=$this->banner->all()->toArray();
		$this->nav=$this->common->navSort();
		$this->user=new User();
	}
	public function index(Request$v_1,$v_2="")
	{
		if(config('cacheconfig.cacheswitch'))
		{
			if(Cache::has('static_index')&& $v_2=='')
			{
				return Cache::get('static_index');
			}
		}
		$var_873=$this->fenlei;
		if(config('webset.randmovie'))
		{
			$var_874=$this->core->dsjList('all',rand(1,24));
			$var_875=$this->core->zyList('all',rand(1,24));
			$var_241=$this->core->dmList('all',rand(1,24));
			$var_876=$this->core->dyList('all',rand(1,24));
		}
		else
		{
			$var_874=$this->core->dsjList('all',1);
			$var_875=$this->core->zyList('all',1);
			$var_241=$this->core->dmList('all',1);
			$var_876=$this->core->dyList('all',1);
		}
		if(config('autocxconfig.is_autocx'))
		{
			$var_877=[];
			$var_878=config('autocxconfig.dizhi');
			$var_879=$this->core->AutoCxList($v_1,$var_878,rand(5,8),rand(1,3));
			foreach($var_879 as $var_201)
			{
				$var_877[]=$var_201[0];
			}
			$this->newlist=$var_877;
		}
		$var_880=view('template.'.config('webset.webtemplate').'.index',['dsjs'=>$var_874,'dys'=>$var_876,'zys'=>$var_875,'dms'=>$var_241,index=>1,'yqlist'=>$this->yqlist,'dydata'=>$this->newlist,'vipdata'=>$this->viplist,'videotype'=>$var_873,'bannerlist'=>array_reverse($this->bannerlist),'navlist'=>$this->nav])->__toString();
		if(config('cacheconfig.cacheswitch'))
		{
			Cache::forever('static_index',$var_880);
		}
		return $var_880;
	}
	public function dy($v_3='all',$v_4='1')
	{
		$var_449=$this->core->dyList($v_3,$v_4);
		$var_882=$this->common->getPageHtml($v_4,24,$v_3,'movielist');
		return view('template.'.config('webset.webtemplate').'.movie',['dys'=>$var_449,'pagehtml'=>$var_882,'dytype'=>($this->fenlei)['movie'],'yqlist'=>$this->yqlist,'navlist'=>$this->nav,'cat'=>$v_3]);
	}
	public function cX()
	{
		return view('template.'.config('webset.webtemplate').'.vip',['vipdata'=>$this->viplist,'yqlist'=>$this->yqlist,'navlist'=>$this->nav]);
	}
	public function autoCx(Request$v_5,$v_6='5',$v_7='1')
	{
		$var_885=[];
		if($v_6==24)
		{
			exit('非法请求');
		}
		
		
		$var_281=config('autocxconfig.dizhi');
		$var_887=$this->common->getPageHtml($v_7,24,$v_6,'autocxlist');
		$var_888=$this->core->AutoCxList($v_5,$var_281,$v_6,$v_7);
		foreach($var_888 as $var_889)
		{
			$var_885[]=$var_889[0];
		}
		return view('template.'.config('webset.webtemplate').'.autocx',['dydata'=>$var_885,'cxtype'=>($this->fenlei)[cx],'yqlist'=>$this->yqlist,'navlist'=>$this->nav,'pagehtml'=>$var_887,]);
	}
	public function tv($v_8='all',$v_9='1')
	{
		$var_155=$this->core->dsjList($v_8,$v_9);
		$var_891=$this->common->getPageHtml($v_9,24,$v_8,'tvlist');
		return view('template.'.config('webset.webtemplate').'.tv',['dsj'=>$var_155,'pagehtml'=>$var_891,'tvtype'=>($this->fenlei)[tv],'yqlist'=>$this->yqlist,'navlist'=>$this->nav,'cat'=>$v_8]);
	}
	public function zy($v_10='all',$v_11='1')
	{
		$var_893=$this->core->zyList($v_10,$v_11);
		$var_894=$this->common->getPageHtml($v_11,24,$v_10,'zylist');
		return view('template.'.config('webset.webtemplate').'.zy',['zys'=>$var_893,'pagehtml'=>$var_894,'zytype'=>($this->fenlei)[zy],'yqlist'=>$this->yqlist,'navlist'=>$this->nav,'cat'=>$v_10]);
	}
	public function dm($v_12='all',$v_13='1')
	{
		$var_896=$this->core->dmList($v_12,$v_13);
		$var_897=$this->common->getPageHtml($v_13,24,$v_12,'dmlist');
		return view('template.'.config('webset.webtemplate').'.dm',['dms'=>$var_896,'pagehtml'=>$var_897,'dmtype'=>($this->fenlei)[dm],'yqlist'=>$this->yqlist,'navlist'=>$this->nav,'cat'=>$v_12]);
	}
	public function play(Request$v_14,$v_15)
	{
		$var_899=$this->common->filterQq($v_15);
		if($var_899==1)
		{
			return view('template.'.config('webset.webtemplate').'.qqtip');
		}
		$var_900=$this->getHistroy($v_14);
		if($var_900)
		{
			krsort($var_900);
		}
		if(is_numeric($v_15))
		{
			$var_901=$this->dydata->where(['dy_id'=>$v_15])->first()->toArray();
			$var_902=$this->common->getJs($var_901['dy_addr']);
			$var_901['dy_addr']=$var_902;
			return view('template.'.config('webset.webtemplate').'.otherplay',['cxs'=>$var_901,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav]);
		}
		$var_903=base64_decode($v_15);
		if(strpos($var_903,'om/m/')!==false)
		{
			$var_904=$this->core->getDyPlay($var_903);
			$var_905=$this->core->getLike($var_903);
			return view('template.'.config('webset.webtemplate').'.mplay',['desc'=>$var_904[0]['desc'],'pm'=>$var_904[0]['title'],'dyplay'=>$var_904,'jk'=>$this->jk,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav,'like'=>$var_905]);
		}
		elseif(strpos($var_903,'om/tv/')!==false)
		{
			$var_906=$this->getTvList($var_903,2);
			$var_904=$this->core->getDsjPlay($var_903);
			$var_905=$this->core->getTDLike(tv,$var_903);
			if($var_906)
			{
				return view('template.'.config('webset.webtemplate').'.tvplay',['desc'=>$var_904[0]['desc'],'pm'=>$var_904[0]['title'],'js'=>$var_906,'jk'=>$this->jk,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav,'like'=>$var_905]);
			}
		}
		elseif(strpos($var_903,'om/ct/')!==false)
		{
			$var_906=$this->getTvList($var_903,4);
			$var_904=$this->core->getDsjPlay($var_903);
			$var_905=$this->core->getTDLike(dm,$var_903);
			if($var_906)
			{
				return view('template.'.config('webset.webtemplate').'.dmplay',['desc'=>$var_904[0]['desc'],'pm'=>$var_904[0]['title'],'js'=>$var_906,'jk'=>$this->jk,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav,'like'=>$var_905]);
			}
		}
		elseif(strpos($var_903,'om/va/')!==false)
		{
			$var_904=$this->getZyList($var_903);
			$var_905=$this->core->getLike($var_903);
			return view('template.'.config('webset.webtemplate').'.zyplay',['desc'=>$var_904[0]['desc'],'pm'=>$var_904[0]['bt'],'zylist'=>$var_904,'zd'=>$var_904[0]['zd'],'jk'=>$this->jk,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav,'like'=>$var_905]);
		}
		elseif(strpos($var_903,'?m=v')!==false)
		{
			
			
			$var_908=[];
			$var_902=[];
			$var_903='http://'.config('autocxconfig.dizhi').$var_903;
			$v_13=$this->core->getCxData($var_903);
			$v_15=$this->core->getCxLink($var_903,'total');
			foreach($v_15 as $var_909=>$var_910)
			{
				foreach($var_910 as $var_43)
				{
					trim($var_43);
					$var_911=explode('$',$var_43);
					$v_11['name']=$var_911[0];
					$v_11['url']=$var_911[1];
					$var_902[]=$v_11;
				}
				$var_908[$var_909]=$var_902;
				$var_902=[];
			}
			return view('template.'.config('webset.webtemplate').'.cxplay',['info'=>$v_13[0],'playinfo'=>$var_908,'yqlist'=>$this->yqlist,history=>$var_900,'navlist'=>$this->nav,'playtype'=>$this->playtype]);
		}
	}
	public function zhiBo()
	{
		$var_913=$this->zbdata->where(['zb_type'=>1])->orderBy('zb_sort','desc')->get()->toArray();
		$var_914=$this->zbdata->where(['zb_type'=>2])->orderBy('zb_sort','desc')->get()->toArray();
		$v_2=$this->zbdata->where(['zb_type'=>3])->orderBy('zb_sort','desc')->get()->toArray();
		return view('template.'.config('webset.webtemplate').'.zhibo',['yqlist'=>$this->yqlist,'yslist'=>$var_913,'wslist'=>$var_914,'qtlist'=>$v_2,'navlist'=>$this->nav]);
	}
	public function zbQx(Request$v_16)
	{
		$var_916=$v_16->session()->get('username');
		if(config('userconfig.livebk'))
		{
			if($var_916)
			{
				$var_917=$this->user->where(['user_name'=>$var_916])->first()->toArray();
				$v_11=$var_917['user_level'];
				$var_918=$var_917['user_vip_time'];
				if($v_11==1&& $var_918>time())
				{
					return $this->zhiBo();
				}
				else
				{
					return redirect('/302ucenter.html');
				}
			}
			else
			{
				return redirect('/302userlogin.html');
			}
		}
		else
		{
			return $this->zhibo();
		}
	}
	private function getTvList($v_17,$v_18)
	{
		$v_17=str_replace('https://','',$v_17);
		$var_920=explode('/',$v_17);
		$var_921=str_replace('.html','',$var_920[2]);
		$var_920=['youku'=>'优酷视频','qq'=>'腾讯视频','imgo'=>'芒果TV','qiyi'=>'爱奇艺','levp'=>'乐视视频','cntv'=>'CNTV','sohu'=>'搜狐视频','tudou'=>'土豆视频','pptv'=>'PPTV'];
		$var_922=[];
		foreach($var_920 as $var_923=>$var_924)
		{
			$var_925='https://www.360kan.com/cover/switchsite?site='.$var_923.'&id='.$var_921.'&category='.$v_18;
			$var_926=json_decode($this->common->curl_get($var_925),true);
			if($var_926['error']==0)
			{
				$var_927['name']=$var_924;
				$var_927['data']=$var_926['data'];
				$var_922[]=$var_927;
			}
		}
		return $var_922;
	}
	private function getZyList($v_19)
	{
		$var_928=$this->core->getZyPlay($v_19);
		return $var_928;
	}
	public function appInfo()
	{
		return view('template.'.config('webset.webtemplate').'.appinfo');
	}
	public function Search(Request$v_20,$v_21)
	{
		$var_930=$this->core->getSearch($v_21);
		if(config('autocxconfig.is_autocx'))
		{
			$var_931=$this->core->autoCxSearch($v_21,config('autocxconfig.dizhi'));
		}
		else
		{
			$var_931=$this->common->seacherCx($v_21);
		}
		return view('template.'.config('webset.webtemplate').'.search',['ss'=>$var_930,'cxs'=>$var_931,'searchkey'=>$v_21,'navlist'=>$this->nav,'yqlist'=>$this->yqlist]);
	}
	public function jzAd()
	{
		return view('template.'.config('webset.webtemplate').'.jzad');
	}
	public function cdx($v_22)
	{
		return view('user.302',['url'=>$v_22]);
	}
	public function history(Request$v_23)
	{
		$this->common->saveHistory($v_23);
	}
	public function getHistroy(Request$v_24)
	{
		$var_934=$v_24->cookie(history);
		if($var_934)
		{
			return $var_934;
		}
	}
}
?>