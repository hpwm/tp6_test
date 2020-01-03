<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/2
 * Time: 17:21
 **/

namespace app\controller;


use app\BaseController;
use app\model\User;
use app\service\TestService;
use think\App;

class Test extends BaseController
{

    //protected $app;
    public function __construct(App $app)
    {
        parent::__construct($app);
        $app->bind('foo',Foo::class);
    }

    public function appLists()
    {

        //var_dump($this->app->getBasePath());
    }

    public function containerBind()
    {
//        $bar = new Bar();
//        $foo = new Foo( $bar);
        //$foo = invoke(Foo::class);

        //bind('foo',Foo::class);
        //$res = $this->app->get('foo');
        //(new TestService())->test();
        $res = $this->app->get('pay1');

    }

    //中间件
    public function middleware()
    {

    }

}