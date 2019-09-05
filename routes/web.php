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
//路由
// Route::get('/', function () {
//      session(['user'=>['uid'=>1,'name'=>'牛马宝宝']]);
//     //  dd(\Auth::user());
//     //  dd(\Auth::id());

//     //  dd(session('user'));
//     return view('welcome',['name'=>'王梓晨']);
//     // return view('welcome to 团结屯')->hreder('content-type','text/html');
// });

// Route::get('user', function () {
//     return 123;
// });
//路由的方法
// Route::get('user', 'Usercontroller@index');

// Route::any('/login', function () {
//     return '<form action="/useradd" method=""><input type="text" name=nameadd >'.csrf_field().'<button>提交</button></form>';
// });
// Route::match(['get','post'],'/useradd', function () {
//        dd(request()->nameadd);
//     });

// Route::view('/welcome',['name'=>'哈哈']);
// Route::get('/', function () {
//     return view('welcome',['name'=>'王梓晨']);
// });
// Route::get('user/{id?}', function ($id = '') {
//     return 'User'.$id;
// });

// Route::get('user/{id}', 'Usercontroller@index');
//  Route::get('user/{name}', function ($name) {
//        return $name;
//     })->where('name','[0-9]+');
// Route::get('user/add',function(){
//     return 'my url:'.route('add');
// })->name('add');
// Route::get('user/add','Usercontroller@index')->name('add'); 
// Route::get('redirect',function(){
//     // return redirect()->route('profile');
//     $url = route('profile');
// });
// Route::get('cookie/add', function () {
//     $minutes = 24 * 60;
//     return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', $minutes);
// });

// Route::get('cookie/get', function(\Illuminate\Http\Request $request) {
//     $cookie = $request->cookie('name');
//     dd($cookie);
// });
//


//student
Route::prefix('student')->group(function(){
    Route::get('add','Usercontroller@add');
    Route::post('add_do','Usercontroller@add_do')->name('do');
    Route::get('lists','Usercontroller@lists');
    Route::get('edit/{id}','Usercontroller@edit');
    Route::post('update/{id}','Usercontroller@update');
    Route::get('delete/{id}','Usercontroller@delete');
    Route::post('checkName','Usercontroller@checkName'); 
});

//分送邮件
Route::get('mail','MailController@index');

//首页
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('index','admin\Admincontroller@index');
    Route::get('head','admin\Admincontroller@head')->name('head');
    Route::get('left','admin\Admincontroller@left')->name('left');
    Route::get('main','admin\Admincontroller@main')->name('main');
});

//商品管理
Route::prefix('goods')->middleware('auth')->group(function(){
    Route::get('add','goods\Goodscontroller@add')->name('add');
    Route::post('add_do','goods\Goodscontroller@add_do')->name('gadd_do');
    Route::get('lists','goods\Goodscontroller@lists')->name('lists');
    Route::get('gedit/{id}','goods\Goodscontroller@gedit');
    Route::get('gdel/{id}','goods\Goodscontroller@gdel');
    Route::post('gupd/{id}','goods\Goodscontroller@gupd');
});

//用户管理
Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('uadd','user\Usercontroller@uadd')->name('uadd');
    Route::post('add_do','user\Usercontroller@add_do')->name('add_do');
    Route::get('lists','user\Usercontroller@lists')->name('ulists');
});

//登录
Route::prefix('login')->group(function(){
    Route::get('ladd','login\Logincontroller@ladd')->name('ladd');
    Route::post('ladd_do','login\Logincontroller@ladd_do')->name('ladd_do');

});

//分类
Route::prefix('cat')->middleware('auth')->group(function(){
    Route::get('cadd','cat\Catcontroller@cadd')->name('cadd');
    Route::post('cadd_do','cat\Catcontroller@cadd_do')->name('cadd_do');
    Route::get('clist','cat\Catcontroller@clist')->name('clist');
    Route::get('cdel/{id}','cat\Catcontroller@cdel');
    Route::get('cedit/{id}','cat\Catcontroller@cedit');
    Route::post('cupd/{id}','cat\Catcontroller@cupd');
});

//品牌
Route::prefix('brand')->middleware('auth')->group(function(){
    Route::get('badd','brand\Brandcontroller@badd')->name('badd');
    Route::post('badd_do','brand\Brandcontroller@badd_do')->name('badd_do');
    Route::get('blist','brand\Brandcontroller@blist')->name('blist');
    Route::get('bdel/{id}','brand\Brandcontroller@bdel');
    Route::get('bedit/{id}','brand\Brandcontroller@bedit');
    Route::post('bupd/{id}','brand\Brandcontroller@bupd');

});
//网站
Route::prefix('website')->middleware('auth')->group(function(){
    Route::get('wadd','website\Webcontroller@wadd')->name('wadd');
    Route::post('wadd_do','website\Webcontroller@wadd_do')->name('wadd_do');
    Route::get('wlist','website\Webcontroller@wlist')->name('wlist');
    Route::get('del/{id}','website\Webcontroller@del');
    Route::get('wedit/{id}','website\Webcontroller@wedit');
    Route::post('wupd/{id}','website\Webcontroller@wupd');
});

Route::prefix('ures')->middleware('auth')->group(function(){
    Route::get('index','ures\Urescontroller@index')->name('index');
    Route::post('udo','ures\Urescontroller@udo')->name('udo');
    Route::get('uli','ures\Urescontroller@uli')->name('uli');
    Route::get('uedit/{id}','ures\Urescontroller@uedit');
    Route::post('uupd/{id}','ures\Urescontroller@uupd');
});
//货物
Route::prefix('cargo')->middleware('auth')->group(function(){
    Route::get('goadd','cargo\Gocontroller@goadd')->name('goadd');
    Route::post('godo','cargo\Gocontroller@godo')->name('godo');
    Route::get('goli','cargo\Gocontroller@goli')->name('goli');
    Route::get('go/{id}','cargo\Gocontroller@go');
    Route::post('gup/{id}','cargo\Gocontroller@gup');
});

//后台登录
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//前台首页
Route::get('/','index\Indexcontroller@index');
// Route::get('/','index\Indexcontroller@proinfo')->name('proinfo');
Route::prefix('prolist')->group(function(){
    Route::get('padd','prolist\Procontroller@padd')->name('padd');
    Route::get('proinfo','prolist\Procontroller@proinfo');
});
//购物车
Route::get('car/{gid}','car\Carcontroller@car');

//登录
Route::get('log','log\Logcontroller@index');
Route::post('log','log\Logcontroller@log_do')->name('log_do');
//注册
Route::prefix('logon')->group(function(){
    Route::get('ladd','logon\Logoncontroller@ladd')->name('ladd');
    Route::get('mail','logon\Logoncontroller@mail');
    Route::post('ladd_do','logon\Logoncontroller@ladd_do');
});

Route::prefix('sun')->group(function(){
    Route::get('sadd','sun\Suncontroller@sadd')->name('sadd');
    Route::post('sadd_do','sun\Suncontroller@sadd_do')->name('sadd_do');
    Route::get('slist','sun\Suncontroller@slist')->name('slist');
});


Route::prefix('school')->group(function(){
    Route::get('sadd','school\Schcontroller@sadd')->name('sadd');
    Route::post('sadd_do','school\Schcontroller@sadd_do')->name('sadd_do');
    Route::get('slis','school\Schcontroller@slis')->name('slis');
    Route::get('sdel/{id}','school\Schcontroller@sdel')->name('sdel');
    Route::get('sedit/{id}','school\Schcontroller@sedit')->name('sedit');
    Route::post('supd/{id}','school\Schcontroller@supd')->name('supd');
});
//新闻表
Route::prefix('news')->middleware('auth')->group(function(){
    Route::get('nadd','news\Newscontroller@nadd');
    Route::post('nadd_do','news\Newscontroller@nadd_do')->name('nadd_do');
    Route::get('nlist','news\Newscontroller@nlist')->name('nlist');
    Route::get('show/{id}','news\Newscontroller@show')->name('show');
});
//球队
Route::prefix('comp')->group(function(){
    Route::get('coma','comp\Comcontroller@coma');
    Route::post('comd','comp\Comcontroller@comd')->name('comd');
    Route::get('comli','comp\Comcontroller@comli')->name('comli');
    Route::get('comc/{id}','comp\Comcontroller@comc');
});




////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('wechat')->group(function(){
    Route::get('get_access_token','wechat\WechatContrller@get_access_token');
    Route::get('get_wechat_access_token','wechat\WechatContrller@get_wechat_access_token');
    Route::get('get_user_contents','wechat\WechatController@get_user_contents');
    Route::get('get_user_info/{openid}','wechat\WechatController@get_user_info');
    Route::get('login','wechat\LoginController@login');
    Route::get('wechat_login','wechat\LoginController@wechat_login');//微信授权登陆
    Route::get('code','wechat\LoginController@code');//

    
});








