<?php


namespace app\common\workerman;


use think\worker\Server;

class TestWorkerman extends Server
{
    public function onWorkerStart()
    {
        echo 'onworkerstart';
    }
}