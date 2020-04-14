<?php


namespace app\common\command;


use app\common\service\WorkermanService;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\facade\App;
use think\facade\Config;
use think\worker\Server as WorkerServer;
use Workerman\Worker;
class Workerman extends Command
{
    protected $config = [];

    public function configure()
    {
        $this->setName('workerman')
            ->addArgument('action', Argument::OPTIONAL, "start|stop|restart|reload|status|connections", 'start')
            ->addOption('host', 'H', Option::VALUE_OPTIONAL, 'the host of workerman server.', null)
            ->addOption('port', 'p', Option::VALUE_OPTIONAL, 'the port of workerman server.', null)
            ->addOption('daemon', 'd', Option::VALUE_NONE, 'Run the workerman server in daemon mode.')
            ->setDescription('Workerman Task !');
    }

    public function execute(Input $input, Output $output)
    {
        $action = $input->getArgument('action');

        if (DIRECTORY_SEPARATOR !== '\\') {
            if (!in_array($action, ['start', 'stop', 'reload', 'restart', 'status', 'connections'])) {
                $output->writeln("<error>Invalid argument action:{$action}, Expected start|stop|restart|reload|status|connections .</error>");
                return false;
            }

            global $argv;
            array_shift($argv);
            array_shift($argv);
            array_unshift($argv, 'think', $action);
        } elseif ('start' != $action) {
            $output->writeln("<error>Not Support action:{$action} on Windows.</error>");
            return false;
        }



        if ('start' == $action) {
            $output->writeln('Starting Workerman server...');
        }
        //$tasks=$this->test();
        // 自定义服务器入口类
        $tasks = \app\model\Workerman::select();
//        $tasks = [['class_name'=>'TestWorkerman']];
////        $tasks = WorkermanService::tasks();
//        //$tasks = \think\facade\Db::name('workerman')->select();
        foreach ($tasks as $server) {
            $this->startServer($server);
        }

        // Run worker
        //Worker::runAll();

        $this->test();


//        $this->config = Config::get('worker_server');
//
//        if ('start' == $action) {
//            $output->writeln('Starting Workerman server...');
//        }
//
//        // 自定义服务器入口类
//        if (!empty($this->config['worker_class'])) {
//            $class = (array) $this->config['worker_class'];
//
//            foreach ($class as $server) {
//                $this->startServer($server);
//            }
//
//            // Run worker
//            Worker::runAll();
//            return;
//        }


    }

    public function test()
    {
        Worker::runAll();
    }

    protected function startServer($task)
    {
        //$class = '\\app\common\workerman\\'.$task['class_name'];
        $class = '\\app\common\workerman\\TestWorkerman';
        $worker = new $class;
//        if (class_exists($class)) {
//            $worker = new $class;
//            if (!$worker instanceof WorkerServer) {
//                $this->output->writeln("<error>Worker Server Class Must extends \\think\\worker\\Server</error>");
//            }
//        } else {
//            $this->output->writeln("<error>Worker Server Class Not Exists : {$class}</error>");
//        }
    }

    protected function getHost()
    {
        if ($this->input->hasOption('host')) {
            $host = $this->input->getOption('host');
        } else {
            $host = !empty($this->config['host']) ? $this->config['host'] : '0.0.0.0';
        }

        return $host;
    }

    protected function getPort()
    {
        if ($this->input->hasOption('port')) {
            $port = $this->input->getOption('port');
        } else {
            $port = !empty($this->config['port']) ? $this->config['port'] : 2345;
        }

        return $port;
    }
}