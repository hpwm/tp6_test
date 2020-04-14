<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/3/14
 * Time: 11:21
 **/

namespace app\job;


use think\queue\Job;

class TestJob
{
    public function fire(Job $job,$data)
    {
        if ($job->attempts() > 3) {
            //通过这个方法可以检查这个任务已经重试了几次了
            echo '任务已执行三次';
        }
        echo '任务进来了'.PHP_EOL;
        var_dump($data);

        //如果任务执行成功后 记得删除任务，不然这个任务会重复执行，直到达到最大重试次数后失败后，执行failed方法
        $job->delete();

        // 也可以重新发布这个任务
        //$job->release($delay); //$delay为延迟时间
    }

    public function failed($data){

        // ...任务达到最大重试次数后，失败了
    }
}