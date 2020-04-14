<?php
require_once __DIR__ . '/vendor/autoload.php';
$user='py_test';
$pass='bY7EsWfctAecAJET';
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=py_test', $user, $pass);
    foreach($dbh->query('SELECT * from `xmt_workerman`') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// 创建一个Worker监听2345端口，使用http协议通讯
$http_worker = new \Workerman\Worker("http://0.0.0.0:2345");

// 启动4个进程对外提供服务
$http_worker->count = 4;

// 接收到浏览器发送的数据时回复hello world给浏览器
$http_worker->onMessage = function($connection, $data) use($dbh)
{
    // 向浏览器发送hello world
    $connection->send('hello world');
};

// 运行worker
\Workerman\Worker::runAll();
