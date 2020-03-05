<?php
declare (strict_types = 1);

namespace app\event;

use app\controller\Bar;
use app\model\User;

class UserLogin
{
    public $bar;
    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }
}
