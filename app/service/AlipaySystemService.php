<?php
declare (strict_types = 1);

namespace app\service;

use app\pay\Pay1;
use app\pay\Pay2;

class AlipaySystemService  extends \think\Service
{

    /**
     * 注册服务
     *
     * @return mixed
     */
    public function register()
    {
    	 $this->app->bind('pay1',Pay1::class);
    	 $this->app->bind('pay2',Pay2::class);
    }

    
    /**
     * 执行服务
     *
     * @return mixed
     */
    public function boot()
    {
        //
        echo 'boot';
    }
}
