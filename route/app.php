<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;


//定义了这个之后,但凡控制器没注册路由或者是出错,都跳转到error.miss方法里 固定写法,而且开了调试器都没用,还是会到这个页面
//Route::miss('public/miss');//这样写在外面就是全局miss,如果写在分组里,就是局部miss



//定义路由规则的小案例
Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

//注册路由: rule表示各种请求都可以 不区分大小写
//Route::rule('url(路由)','真实访问的路径');

//              /:id表示的是参数,表示往这个真实路径传递的参数,这种传参方法只能用rule和get,post不行
Route::rule('getid/:id','Address/detail');
//访问地址为:http://yds.cn/onlinemarkDown/public/getid/123

//换首页
//Route::rule('/','helloworld/index');



//分组的好处就是,可以统一加路由参数,可以统一加url前缀
//这个add是url的前缀，就是在url中需要先输入这个add/
Route::group('add',function (){
    Route::rule('id/:id','Address/detail');
    Route::rule('rd/:name','Address/readname');
})
    ->append(['etrParam'=>'额外参数'])
    ->denyExt('jpg|gif');//禁止在url中输入的后缀


Route::group( 'add',function (){
    Route::rule('id2/:id','detail2');
    Route::rule('rd2/:name','readname2');

//    局部miss,写在对应控制器中php think make:controller Blog
    Route::miss('miss');
})  ->prefix('Address/')//这个Address/是实际控制器的前缀，加了这个就统一了控制器
    ->denyExt('jpg|gif');//禁止在url中输入的后缀




//多级控制器也一样
Route::rule('son','Blog.comment/index');
Route::group('blogs',function (){
    Route::rule('son','index');
})->prefix('Blog.comment/');