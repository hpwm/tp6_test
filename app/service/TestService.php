<?php


namespace app\service;


use think\App;

class TestService
{
    public static function __make(App $app)
    {
        echo 444;
    }


    public function test()
    {
        app()->get('foo');
    }
}