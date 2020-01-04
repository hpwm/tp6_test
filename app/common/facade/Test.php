<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/4
 * Time: 13:31
 **/

namespace app\common\facade;


use think\Facade;

class Test extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\test\TestFacade';
    }
}