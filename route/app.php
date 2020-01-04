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
use app\middleware\Check;
use think\middleware\AllowCrossDomain;
Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

Route::group('test',function(){
    Route::get('appLists', 'appLists');
    Route::get('containerBind', 'containerBind');
    Route::get('facade', 'facade');
    //Route::get('middleware', 'middleware')->middleware([AllowCrossDomain::class],['Access-Control-Allow-Headers'=>'token']);
    Route::get('middleware', 'middleware')->middleware([Check::class],['test'=>'token']);
    Route::get('login', 'login');


    //路由 组合变量
    Route::get('combine-<name>-<id>','route');

    Route::get('commond','commond');

})->prefix('test/');
//资源路由
Route::resource('blog', 'Test');