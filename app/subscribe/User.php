<?php
declare (strict_types = 1);

namespace app\subscribe;

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
}
