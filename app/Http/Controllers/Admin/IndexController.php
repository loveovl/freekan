<?php

//decode by http://www.yunlu99.com/
namespace App\Http\Controllers\Admin;

use App\Banner;
use App\DyData;
use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Common\SystemCotroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;
use App\Kami;
use App\LiveData;
use App\Nav;
use App\Tort;
use App\User;
use App\YqLink;
use core\libs\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class IndexController extends Controller
{
	private $core;
	private $webset;
	private $system;
	private $common;
	private $user;
	private $kami;
	private $dydata;
	private $banner;
	private $zbdata;
	private $nav;
	private $tort;
	private $yqlink;
	private $actional;
	public function __construct()
	{
		$this->core = new CoreController();
		$this->system = new SystemCotroller();
		$this->common = new CommonController();
		$this->actional = new actionController();
		$this->user = new User();
		$this->kami = new Kami();
		$this->dydata = new DyData();
		$this->banner = new Banner();
		$this->zbdata = new LiveData();
		$this->nav = new Nav();
		$this->tort = new Tort();
		$this->yqlink = new YqLink();
	}
	public function index()
	{
		$_var_0 = 2349387;
		$_var_1 = $this->dydata->count('dy_id');
		$_var_2 = $this->system->getMem();
		$_var_3 = $this->system->getServerInfo();
		$_var_4 = $this->user->count('user_id');
		$_var_5 = $this->kami->count('km_id');
		$_var_6 = ['usernum' => $_var_4, 'kaminum' => $_var_5];
		return view('admin.index', ['total' => $_var_0 + $_var_1, 'used_mem' => $_var_2, 'info' => $_var_3, 'webset' => $this->webset, 'num' => $_var_6]);
	}
	public function webSet()
	{
		$_var_7 = config('webset');
		$_var_8 = $this->common->getTemDir();
		return view('admin.adminset', ['webset' => $_var_7, 'templates' => $_var_8]);
	}
	public function jkSet()
	{
		$_var_9 = config('jkset');
		return view('admin.jiekou', ['jkset' => $_var_9, 'webset' => $this->webset]);
	}
	public function newMovieList()
	{
		$_var_10 = $this->dydata->where('dy_id', '>', 0)->orderBy('dy_create_time', 'desc')->get()->toArray();
		return view('admin.newmovielist', ['dylist' => $_var_10]);
	}
	public function autoCx(Request $_var_11)
	{
		$_var_12 = $this->finalkey($_var_11);
		
		return view('admin.autocx');
	}
	public function addNewMovie()
	{
		return view('admin.addnewmovie');
	}
	public function editMovie($_var_13)
	{
		$_var_14 = $this->dydata->where(['dy_id' => $_var_13])->first()->toArray();
		return view('admin.editmovie', ['dy' => $_var_14]);
	}
	public function makeUrl()
	{
		return view('admin.shorturl');
	}
	public function yqLink()
	{
		return view('admin.addyqlink');
	}
	public function yqLinkList()
	{
		$_var_15 = $this->yqlink->where('yq_id', '>', 0)->orderBy('yq_create_time', 'desc')->get()->toArray();
		return view('admin.yqlinklist', ['yqlist' => $_var_15]);
	}
	public function editYqLink($_var_16)
	{
		$_var_17 = $this->yqlink->find($_var_16)->toArray();
		return view('admin.edityq', ['yq' => $_var_17]);
	}
	public function addZb()
	{
		return view('admin.addzb');
	}
	public function addZb2(Request $_var_18)
	{
		$_var_19 = $this->finalkey($_var_18);
		
		return view('admin.addzb2');
	}
	public function zbList()
	{
		$_var_20 = ['1' => '央视频道', '2' => '卫视频道', '3' => '其他频道'];
		$_var_21 = $this->zbdata->where('zb_id', '>', 0)->orderBy('zb_create_time', 'desc')->get()->toArray();
		return view('admin.zblist', ['zblist' => $_var_21, 'zbtype' => $_var_20]);
	}
	public function finalkey(Request $_var_22)
	{
		$_var_24 = substr($_var_23, 1, 6);
		$_var_25 = substr($_var_23, 4, 7);
		$_var_26 = $_var_24 . $_var_23 . $_var_25;
		return $_var_26;
	}
	public function editZb($_var_27)
	{
		$_var_28 = $this->zbdata->where(['zb_id' => $_var_27])->first()->toArray();
		return view('admin.editzb', ['zb' => $_var_28]);
	}
	public function WeiXin()
	{
		return view('admin.weixin');
	}
	public function flushCache()
	{
		return view('admin.cache');
	}
	public function cacheSet()
	{
		return view('admin.cacheset');
	}
	public function setAd()
	{
		return view('admin.setad');
	}
	public function appInfo()
	{
		return view('admin.appinfo');
	}
	public function addQq()
	{
		return view('admin.addqq');
	}
	public function qqList()
	{
		$_var_29 = $this->tort->all()->toArray();
		return view('admin.qqlist', ['qqlist' => $_var_29]);
	}
	public function editQq($_var_30)
	{
		$_var_31 = $this->tort->find($_var_30)->toArray();
		return view('admin.editqq', ['tort' => $_var_31]);
	}
	public function addBanner()
	{
		return view('admin.addbanner');
	}
	public function bannerList()
	{
		$_var_32 = $this->banner->all()->toArray();
		return view('admin.bannerlist', ['bannerlist' => $_var_32]);
	}
	public function editBanner($_var_33)
	{
		$_var_34 = $this->banner->where(['banner_id' => $_var_33])->first()->toArray();
		return view('admin.editbanner', ['banner' => $_var_34]);
	}
	public function addNav()
	{
		return view('admin.addnav');
	}
	public function navList()
	{
		$_var_35 = $this->nav->all()->toArray();
		return view('admin.navlist', ['navlist' => $_var_35]);
	}
	public function editNav($_var_36)
	{
		$_var_37 = $this->nav->find($_var_36)->toArray();
		return view('admin.editnav', ['nav' => $_var_37]);
	}
	public function playerSet()
	{
		return view('admin.playerset');
	}
	public function ccDefense()
	{
		$_var_38 = trim(implode('#', config('ccset.cc_admin_ip')), '#');
		return view('admin.ccdefense', ['cc_admin_ip' => $_var_38]);
	}
}