<?php


namespace app\cron;


use yunwuxin\cron\Task;

class Test1Hour extends Task
{
    public function configure()
    {
        $this->hourlyAt(2); //
    }

    /**
     * 执行任务
     * @return mixed
     */
    protected function execute()
    {
        //...具体的任务执行

        file_put_contents('hour2.json',date('Y-m-d H:i:s').PHP_EOL,FILE_APPEND);
    }
}