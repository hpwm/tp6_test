<?php
declare (strict_types = 1);

namespace app\subscribe;

use think\facade\Env;

class User
{
    public function onUserLogin($params)
    {
        var_dump($params);
        echo '登录进来2';
    }

    public function onUserLogout()
    {
        echo '退出登录';
    }


    public function onAppInit()
    {
        xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
        $XHPROF_ROOT = dirname(__FILE__);
    }

    public function onHttpEnd()
    {
        $xhprof_data = xhprof_disable();
        // display raw xhprof data for the profiler run
        // print_r($xhprof_data);
        // 这里是xhprof的目录 ！！！
        $XHPROF_ROOT = dirname(__FILE__).'/../../public/';
        include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
        include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";
//        // save raw data for this profiler run using default
//        // implementation of iXHProfRuns.
        $xhprof_runs = new \XHProfRuns_Default();
//        // save the run under a namespace "xhprof_foo"
        $run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");
    }
}
