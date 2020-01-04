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
use app\common\facade\Test as TestFacade;
use think\facade\Event;

class Test extends BaseController
{

    //protected $app;
    public function __construct(App $app)
    {
//        parent::__construct($app);
//        $app->bind('foo',Foo::class);
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


    public function facade()
    {
        TestFacade::test();
    }

    //中间件
    public function middleware()
    {
        return 'middleware';
    }


    //事件
    public function login()
    {
        $id = input('id',0);//观察者模式
        if($id){
            $user = new Bar();
            //如果没有在event.php注册UserLogin 可手动注册
            //Event::listen('UserLogin', 'app\listener\UserLogin');//相当于在event.php 进行linsten绑定

            //只需要注册listen类
            //$res = Event::trigger('UserLogin',$user);
            //$res = event('UserLogin',['id'=>3]);
            //var_dump($res);

            //事件订阅
            //Event::trigger('User',['id'=>'test']);
            //Event::subscribe('app\subscribe\User');//这里订阅或者则event.php里面订阅 不能重复注册

            //Event::trigger('UserLogin',['id'=>'test']);//登录事件  如果订阅的此方法和listen重名会执行两次
            //Event::trigger('UserLogout',['id'=>'test']);//登出事件


        }
    }


    //路由
    public function route($name,$id)
    {
        //组合变量
        //var_dump($name,$id);
    }


    public function index()
    {
        echo 'resource-index';
    }

    public function commond()
    {
        echo 242;
    }

}