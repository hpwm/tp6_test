<?php
// 事件定义文件
return [
    'bind'      => [
        //'UserLogin' => 'app\event\UserLogin',
    ],

    'listen'    => [
        'AppInit'  => [],
        'HttpRun'  => [],
        'HttpEnd'  => [],
        'LogLevel' => [],
        'LogWrite' => [],
        //'UserLogin'    =>    ['app\listener\UserLogin'],

    ],

    'subscribe' => [
        //'app\subscribe\User',
    ],
];
