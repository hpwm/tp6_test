<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/3/5
 * Time: 18:08
 **/

namespace app\crontab;


use yunwuxin\cron\Task;

class TestTask extends Task
{
    public function configure()
    {
        echo 'enter';
        $this->everyMinute(); //设置任务的周期，每天执行一次，更多的方法可以查看源代码，都有注释
    }
    /**
     * 执行任务
     * return mixed
     */
    protected function execute()
    {
        file_put_contents('date.json',date('Y-m-d H:i:s').PHP_EOL,FILE_APPEND);
        //...具体的任务执行
    }
}