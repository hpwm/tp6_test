<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/2
 * Time: 17:21
 **/

namespace app\controller;


use app\BaseController;

class Test extends BaseController
{
    public function appLists()
    {
        var_dump($this->app->getBasePath());
    }
}