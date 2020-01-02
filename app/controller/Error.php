<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/2
 * Time: 17:44
 **/

namespace app\controller;


class Error
{
    public function __call($method, $args)
    {
        return 'error request!';
    }
}