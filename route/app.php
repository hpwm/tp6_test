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

    Route::get('cmiddleware','cmiddleware');
    Route::get('pdfs','pdfs');


})->prefix('test/');

Route::miss(function () {
    return json(['status'=>'-1','message'=>'未找到路由信息！']);
});
Route::get( 'doc1', "\\ric\\apidoc\\Doc@get_api_list");
Route::any( '/', function () {
    return redirect( '/doc/document?name=explain' );
} );
Route::get( 'assets', "\\ric\\apidoc\\Controller@assets", [ 'deny_ext' => 'php|.htacess' ] );
Route::get( 'module', "\\ric\\apidoc\\Controller@module" );
Route::get( 'action', "\\ric\\apidoc\\Controller@action" );
Route::get( 'doc/document', "\\ric\\apidoc\\Controller@document" );

Route::any( 'login$', "\\ric\\apidoc\\Controller@login" );
Route::any( 'format_params', "\\ric\\apidoc\\Controller@format_params" );
