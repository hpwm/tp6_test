<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/2
 * Time: 17:21
 **/

namespace app\controller;


use app\BaseController;
use app\middleware\Cmiddleware;
use app\model\User;
use app\Request;
use app\service\TestService;
use Mpdf\Mpdf;
use think\App;
use app\common\facade\Test as TestFacade;
use think\facade\Event;
use think\Request as TRequest;

class Test extends BaseController
{

    //protected $middleware = [Cmiddleware::class];


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

    public function commond(TRequest $request)
    {
        $a = 'ss';
        var_dump($request->query());
    }

    public function cmiddleware()
    {

    }


    public function pdfs()
    {
        $content = fopen('C:\Users\Administrator\Desktop\loan.docx','r+');
        fre;
        $url = 'https://dev.xunmatong.cn/contract/orderContract?id=1909105879914365';
        $html = file_get_contents($url);
        $mpdf = new Mpdf(['default_font_size'=>20]);
        //设置中文字体
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $header='<table width="95%" style="margin:0 auto;border-bottom: 1px solid #4F81BD; vertical-align: middle; font-family:serif; font-size: 9pt; color: #000088;"><tr>
                <td width="10%"></td><td width="80%" align="center" style="font-size:16px;color:#A0A0A0">页眉</td>
                <td width="10%" style="text-align: right;"></td></tr></table>';

                //设置PDF页脚内容
                        //在页脚html中添加 {PAGENO}/{nb} (当前页/总页数) 可添加页码
        $footer='<table width="100%" style=" vertical-align: bottom; font-family:serif; font-size: 9pt; color: #000088;"><tr style="height:30px"></tr><tr>
                <td width="10%"></td><td width="80%" align="center" style="font-size:14px;color:#A0A0A0">页脚</td>
                <td width="10%" style="text-align: left;">页码：{PAGENO}/{nb}</td></tr></table>';

        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);
        $mpdf->WriteHTML($html,0);
        $mpdf->Output('test.pdf');
    }

}