<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#前台路由
Route::get('/', 'Index\IndexController@index')->middleware('CcDefense');//首页
Route::get('', 'Index\IndexController@index')->middleware('CcDefense');//首页
Route::get('movielist/{cat}/{page}.html', 'Index\IndexController@dy')->middleware('CcDefense');//电影列表
Route::get('tvlist/{cat}/{page}.html', 'Index\IndexController@tv')->middleware('CcDefense');//电视剧列表
Route::get('zylist/{cat}/{page}.html', 'Index\IndexController@zy')->middleware('CcDefense');//综艺列表
Route::get('dmlist/{cat}/{page}.html', 'Index\IndexController@dm')->middleware('CcDefense');//动漫列表列表
Route::get('viplist.html', 'Index\IndexController@cX')->middleware('CcDefense');//尝鲜视频列表
Route::get('autocxlist/{type}/{pg}.html', 'Index\IndexController@autoCx')->middleware('CcDefense');//自动尝鲜视频列表
Route::get('zhibo.html', 'Index\IndexController@zbQx')->middleware('CcDefense');//直播
Route::get('play/{play}.html', 'Index\IndexController@play')->middleware('CcDefense','CheckPlay');//播放
Route::get('search/{key}.html', 'Index\IndexController@Search')->middleware('CcDefense');//搜索
Route::get('search/{key}', 'Index\IndexController@Search')->middleware('CcDefense');//搜索
Route::get('history','Index\IndexController@history')->middleware('CcDefense');//历史记录
Route::get('jzad','Index\IndexController@jzAd')->middleware('CcDefense');//加载广告
Route::get('app.html','Index\IndexController@appInfo')->middleware('CcDefense');//加载广告
Route::get('302{url}.html','Index\IndexController@cdx')->middleware('CcDefense');//重定向页面


#后台路由
Route::get(empty(config('webset.webdir')) ? 'admin' : config('webset.webdir'), 'Admin\IndexController@index')->middleware('CheckLogin');//后台首页
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/webset', 'Admin\IndexController@webSet')->middleware('CheckLogin');//后台网站设置
Route::post('action/webset', 'Admin\actionController@webSet')->middleware('CheckToken','CheckLogin');//执行后台设置操作
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/jkset', 'Admin\IndexController@jkSet')->middleware('CheckLogin');//接口设置界面
Route::post('action/jkset', 'Admin\actionController@jkSet')->middleware('CheckToken','CheckLogin');//执行接口设置操作
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/newmovielist', 'Admin\IndexController@newMovieList')->middleware('CheckLogin');//尝鲜列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/autocx', 'Admin\IndexController@autoCx')->middleware('CheckLogin');//自动尝鲜
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addnewmovie', 'Admin\IndexController@addNewMovie')->middleware('CheckLogin');//增加
Route::post('action/addnewmovie', 'Admin\actionController@addNewMovie')->middleware('CheckToken','CheckLogin');//执行电影增加操作
Route::post('action/autocx', 'Admin\actionController@autoCx')->middleware('CheckToken','CheckLogin');//执行电影增加操作
Route::post('action/editmovie', 'Admin\actionController@editMovie')->middleware('CheckToken','CheckLogin');//执行电影编辑操作
Route::post('action/delmovie', 'Admin\actionController@deleteMovie')->middleware('CheckToken','CheckLogin');//执行电影删除操作

Route::post('action/addzb', 'Admin\actionController@addZb')->middleware('CheckToken','CheckLogin');//执行直播增加操作
Route::post('action/addzb2', 'Admin\actionController@addZb2')->middleware('CheckToken','CheckLogin');//执行直播增加操作
Route::post('action/editzb', 'Admin\actionController@editZb')->middleware('CheckToken','CheckLogin');//执行直播编辑操作
Route::post('action/delzb', 'Admin\actionController@deleteZb')->middleware('CheckToken','CheckLogin');//执行直播删除操作

Route::post('action/addyqlink', 'Admin\actionController@addYqLink')->middleware('CheckToken','CheckLogin');//执行友情链接添加操作
Route::post('action/delyqlink', 'Admin\actionController@deleteYqLink')->middleware('CheckToken','CheckLogin');//执行友情删除操作
Route::post('action/edityqlink', 'Admin\actionController@editYqList')->middleware('CheckToken','CheckLogin');//执行友情编辑操作
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/edityqlink/{id}', 'Admin\IndexController@editYqLink')->middleware('CheckLogin');//友链编辑页面

Route::post('action/shorturl', 'Admin\actionController@getShortUrl')->middleware('CheckToken','CheckLogin');//生成短网址
Route::post('action/weixin', 'Admin\actionController@setWeiXin')->middleware('CheckToken','CheckLogin');//设置微信信息
Route::any('yzwx', 'Admin\YzController@Index');//验证微信
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/editmovie/{id}', 'Admin\IndexController@editMovie')->middleware('CheckLogin');//执行电影编辑操作
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/shorturl', 'Admin\IndexController@makeUrl')->middleware('CheckLogin');//短网址
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/weixin', 'Admin\IndexController@WeiXin')->middleware('CheckLogin');//对接微信
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addyqlink', 'Admin\IndexController@yqLink')->middleware('CheckLogin');//添加友情链接
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/yqlinklist', 'Admin\IndexController@yqLinkList')->middleware('CheckLogin');//友情链接列表

Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addzb', 'Admin\IndexController@addZb')->middleware('CheckLogin');//添加直播页面
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addzb2', 'Admin\IndexController@addZb2')->middleware('CheckLogin');//添加直播页面
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/zblist', 'Admin\IndexController@zbList')->middleware('CheckLogin');//直播列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/editzb/{id}', 'Admin\IndexController@editZb')->middleware('CheckLogin');//直播编辑页面

Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/cache', 'Admin\IndexController@flushCache')->middleware('CheckLogin');//缓存
Route::get('action/flushcache/{action}','Admin\actionController@flushCache')->middleware('CheckLogin');
Route::get('/'.(empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')).'login', 'Admin\adminLoginController@adminLogin');//后台登录界面
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')).'/editadmin', 'Admin\adminLoginController@ChangeInfo')->middleware('CheckLogin');//修改密码
Route::get('/adminloginout', 'Admin\adminLoginController@loginOut');//后台登录注销
Route::post('/action/login-check', 'Admin\adminLoginController@loginCheck','CheckToken');//登录判断
Route::post('/action/changeinfo', 'Admin\adminLoginController@xgInfo')->middleware('CheckToken','CheckLogin');//修改登录信息
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/setad','Admin\IndexController@setAd')->middleware('CheckLogin');//广告设置
Route::post('action/setad', 'Admin\actionController@setAd')->middleware('CheckToken','CheckLogin');//执行广告设置
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/dhset','Admin\IndexController@dhSet')->middleware('CheckLogin');//菜单名称
Route::post('action/dhset', 'Admin\actionController@dhSet')->middleware('CheckToken','CheckLogin');//执行导航名称修改
Route::post('action/appinfo', 'Admin\actionController@appInfo')->middleware('CheckToken','CheckLogin');//执行APP信息修改
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/appinfo','Admin\IndexController@appInfo')->middleware('CheckLogin');//APP信息

#侵权处理
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addqq','Admin\IndexController@addQq')->middleware('CheckLogin');//添加侵权
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/qqlist','Admin\IndexController@qqList')->middleware('CheckLogin');//侵权列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/editqq/{id}','Admin\IndexController@editQq')->middleware('CheckLogin');//编辑侵权
Route::post('/action/addqq', 'Admin\actionController@addQq','CheckToken');//执行添加侵权
Route::post('/action/editqq', 'Admin\actionController@editQq','CheckToken');//执行编辑侵权
Route::post('/action/delqqlink', 'Admin\actionController@delQqLink','CheckToken');//执行删除侵权


#首页轮播
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addbanner','Admin\IndexController@addBanner')->middleware('CheckLogin');//添加轮播
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/bannerlist','Admin\IndexController@bannerList')->middleware('CheckLogin');//轮播列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/editbanner/{id}','Admin\IndexController@editBanner')->middleware('CheckLogin');//编辑轮播
Route::post('/action/addbanner', 'Admin\actionController@addBanner','CheckToken');//执行添加轮播
Route::post('/action/editbanner', 'Admin\actionController@editBanner','CheckToken');//执行编辑轮播
Route::post('/action/delbanner', 'Admin\actionController@delBanner','CheckToken');//执行删除轮播

#获取尝鲜数据
Route::post('/action/getcx','Admin\actionController@getCx','CheckToken');//获取尝鲜数据
Route::post('/action/getcxlist','Admin\actionController@getCxList','CheckToken');//获取尝鲜列表

#导航设置
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/addnav','Admin\IndexController@addNav')->middleware('CheckLogin');//添加导航
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/navlist','Admin\IndexController@navList')->middleware('CheckLogin');//导航列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/editnav/{id}','Admin\IndexController@editNav')->middleware('CheckLogin');//编辑导航
Route::post('/action/addnav', 'Admin\actionController@addNav','CheckToken');//执行添加轮播
Route::post('/action/editnav', 'Admin\actionController@editNav','CheckToken');//执行编辑轮播
Route::post('/action/delnav', 'Admin\actionController@delNav','CheckToken');//执行删除轮播

#CC防御
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/ccdefense','Admin\IndexController@ccDefense')->middleware('CheckLogin');//编辑CC
Route::post('/action/ccdefense', 'Admin\actionController@ccDefense','CheckToken');//执行cc编辑

#缓存相关
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/cacheset','Admin\IndexController@cacheSet')->middleware('CheckLogin');//缓存设置
Route::post('/action/cacheset', 'Admin\actionController@cacheSet','CheckToken');//执行缓存编辑

#播放器设置
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/playerset','Admin\IndexController@playerSet')->middleware('CheckLogin');//播放器设置
Route::post('/action/playerset', 'Admin\actionController@playerSet','CheckToken');//执行播放器设置



#会员中心
Route::get('userregister.html','Index\UserController@viewRegister')->middleware('CcDefense');
Route::get('userlogin.html','Index\UserController@viewLogin')->middleware('CcDefense');
Route::post('actionreg','Index\UserController@register')->middleware('CcDefense');
Route::post('actionlogin','Index\UserController@login')->middleware('CcDefense');
Route::get('userloginout.html','Index\UserController@loginOut')->middleware('CcDefense');
Route::get('ucenter.html','Index\UserController@viewUCenter')->middleware('CheckUserLogin');
Route::get('changeinfo.html','Index\UserController@viewChangeInfo')->middleware('CheckUserLogin');
Route::post('changepass.html','Index\UserController@ChangePass')->middleware('CheckUserLogin');
Route::get('chongzhi.html','Index\UserController@viewPay')->middleware('CheckUserLogin');
Route::post('pay','Index\UserController@pay')->middleware('CheckUserLogin');
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/userlist','Admin\UCenterController@userList')->middleware('CheckLogin');//会员列表
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/userset','Admin\UCenterController@userSet')->middleware('CheckLogin');//会员设置
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/edituser/{id}','Admin\UCenterController@editUser')->middleware('CheckLogin');//编辑会员
Route::post('action/deluser','Admin\UCenterController@delUser')->middleware('CheckToken','CheckLogin');//删除会员
Route::post('action/userset','Admin\actionController@userSet')->middleware('CheckToken','CheckLogin');//会员设置
Route::post('action/edituser','Admin\actionController@editUser')->middleware('CheckToken','CheckLogin');//执行会员编辑

#卡密管理
Route::get('/kami.html','Admin\UCenterController@makeKami')->middleware('CheckLogin');
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/makekami.html','Admin\UCenterController@viewKami')->middleware('CheckLogin');
Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/kamilist.html','Admin\UCenterController@viewKamiList')->middleware('CheckLogin');
Route::post('/action/kamisc','Admin\UCenterController@kamisc')->middleware('CheckToken','CheckLogin');
Route::post('/action/delkami','Admin\UCenterController@delKami')->middleware('CheckToken','CheckLogin');

Route::get((empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')) . '/token','Admin\adminLoginController@vtoken');



#安装路由
Route::get('/install','Common\InstallController@install');
Route::any('/install/{id}','Common\InstallController@install');
Route::get('yzmysql','Common\InstallController@yzMysql');