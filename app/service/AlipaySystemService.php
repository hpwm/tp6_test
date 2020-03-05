<?php
declare (strict_types = 1);

namespace app\service;

use app\pay\Pay1;
use app\pay\Pay2;
use think\Route;

class AlipaySystemService  extends \think\Service
{

    /**
     * 注册服务
     *
     * @return mixed
     */
    public function register()
    { var_dump('sss');
    	 $this->app->bind('route',Route::class);

    	 #$this->app->bind('pay2',Pay2::class);
    }

    
    /**
     * 执行服务
     *
     * @return mixed
     */
    public function boot()
    {
        //
        #echo 'boot';
    }
}
