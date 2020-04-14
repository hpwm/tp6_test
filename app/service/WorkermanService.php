<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/3/7
 * Time: 14:19
 **/

namespace app\service;




class WorkermanService extends BaseWorkerman
{
    protected $option = [
        'count'=>2,
        'name'=>'test worker'
    ];

    public function onWorkerStart()
    {

    }

}