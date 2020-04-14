<?php


namespace app\cron;


use yunwuxin\cron\Task;

class CrontabTask extends Task
{
    public function configure()
    {
        $this->everyMinute(); //设置任务的周期，每天执行一次，更多的方法可以查看源代码，都有注释
    }

    /**
     * 执行任务
     * @return mixed
     */
    protected function execute()
    {
        //...具体的任务执行

        file_put_contents('1.json',date('Y-m-d H:i:s').PHP_EOL,FILE_APPEND);
    }
}