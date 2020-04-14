<?php


namespace app\common\workerman;


use think\worker\Server;
use Workerman\Worker;

class BaseWorkerman extends Server
{
    public function __construct()
    {
        // 实例化 Websocket 服务
        $this->worker = new Worker();

        // 设置参数
        if (!empty($this->option)) {
            foreach ($this->option as $key => $val) {
                $this->worker->$key = $val;
            }
        }

        // 设置回调
        foreach ($this->event as $event) {
            if (method_exists($this, $event)) {
                $this->worker->$event = [$this, $event];
            }
        }

        // 初始化
        $this->init();
    }
}