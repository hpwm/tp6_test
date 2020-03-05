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

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello')->middleware(['check']);

Route::group('test',function(){
    Route::get('appLists', 'appLists');
    Route::get('containerBind', 'containerBind');
})->prefix('test/');


Route::get('doc/assets', "DocController/assets",['deny_ext'=>'php|.htacess']);
Route::get('doc/search', "DocController/search");
Route::get('doc/list', "DocController/getList");
Route::get('doc/info', "DocController/getInfo");
Route::any('doc/debug', "DocController/debug");
Route::any('doc/pass', "DocController/pass");
Route::any('doc/login', "DocController/login");
Route::any('doc', "DocController/index");

