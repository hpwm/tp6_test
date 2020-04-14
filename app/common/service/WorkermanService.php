<?php


namespace app\common\service;


class WorkermanService
{
    public static function tasks()
    {
        $tasks = \app\model\Workerman::select();
        return $tasks;
    }
}