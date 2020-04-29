<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/2
 * Time: 17:21
 **/

namespace app\controller;


use app\BaseController;
use app\job\TestJob;
use app\middleware\Cmiddleware;
use app\model\TaobaoOrder;
use app\model\User;
use app\service\TestService;
use think\App;
use app\common\facade\Test as TestFacade;
use think\facade\Db;
use think\facade\Event;
use think\facade\Log;
use think\facade\Queue;
use Mpdf\Mpdf;
<<<<<<< HEAD
use think\facade\Session;
=======
use think\log\driver\Socket;
use think\log\driver\SocketLog;
>>>>>>> c5d335a1352aeb43c0938a1c97945d2bcc4de421
use think\Request;
include_once __DIR__.'/../../extend/workerman-JsonRpc/Applications/JsonRpc/Clients/RpcClient.php';
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
        var_dump($name,$id);
    }


    public function index()
    {
        echo 'resource-index';
    }

    public function read($id)
    {
        echo 'resource-read-'.$id;
    }

    public function commond(Request $request)
    {
        //var_dump($request->param('name'));
        //var_dump($request->subDomain()); //tp6_bind
        //var_dump($request->rootDomain()); //
        //var_dump($request->url()); // /test/commond
        //var_dump($request->baseUrl()); //
<<<<<<< HEAD
        Session::set('name1', 'thinkphp3');
        $name = Session::get('name1');
        var_dump($name);
=======
//        $result = TaobaoOrder::select();
//        return json(['data'=>$result]);

        $address_array = array(
            'tcp://127.0.0.1:2015',
            'tcp://127.0.0.1:2015'
        );
// 配置服务端列表
        \RpcClient::config($address_array);

        $uid = 567;

// User对应applications/JsonRpc/Services/User.php 中的User类
        $user_client = \RpcClient::instance('User');

// getInfoByUid对应User类中的getInfoByUid方法
//        $ret_sync = $user_client->getInfoByUid($uid);

        // 异步调用User::getInfoByUid方法
        $user_client->asend_getInfoByUid($uid);
// 异步调用User::getEmail方法
        $user_client->asend_getEmail($uid);



// 需要数据的时候异步接收数据
$ret_async1 = $user_client->arecv_getEmail($uid);
$ret_async2 = $user_client->arecv_getInfoByUid($uid);
        var_dump($ret_async1,$ret_async2);
        die;
        $product = [
            [
                'product_id'=>1,
                'pnid'=>1,
                'pvid'=>10
            ],
            [
                'product_id'=>1,
                'pnid'=>3,
                'pvid'=>30
            ],
            [
                'product_id'=>1,
                'pnid'=>12,
                'pvid'=>21
            ],
            [
                'product_id'=>1,
                'pnid'=>31,
                'pvid'=>33
            ],
        ];
        $oldData = array_column($product,null,'pnid');
        var_dump($oldData);
>>>>>>> c5d335a1352aeb43c0938a1c97945d2bcc4de421
    }

    public function cmiddleware()
    {

        //$name = Session::get('name1');
        //var_dump($name);
        session_start();
        var_dump($_SESSION);
    }


    public function curls()
    {
        $url = 'http://192.168.50.222:9501/test/redisPool';
        for($i=0;$i<50;$i++){
            $data[] = https_request($url);
        }
        var_dump($data);
    }


    public function publish()
    {
        $result = Queue::push(TestJob::class,['id'=>2],'test_job');

        var_dump($result);
        echo '任务添加成功';
    }

    public function pdfs()
    {
        $url = 'https://dev.xunmatong.cn/contract/orderContract?id=1909105879914365';
        $html = file_get_contents($url);
        var_dump($html);
        $mpdf = new Mpdf();
        //设置中文字体
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);

        //直接展示
        //$mpdf -> Output();
        //保存文件
        $mpdf -> Output('test.pdf');
    }

    //组合变量
    public function combineVar()
    {
        return 'combine';
    }

    public function bindModel(User $user,Request $request)
    {
        //var_dump($user->isEmpty());

        var_dump($request->param('name','','strtoupper'));
    }

    public function orders()
    {
        $path = 'order.json';
        $str = file_get_contents($path);
        $data = json_decode($str,true);
        $main_order = $data['mainOrders'];
        $data = array_map(function($v){
            return $this->handleOrder($v);
        },$main_order);
        $model = new TaobaoOrder();
        $result = $model->saveAll($data);
        return json(['code'=>0,'msg'=>'保存成功','data'=>$result]);
    }


    public function handleOrder($order)
    {
        $seller = $order['seller'];
        $payInfo = $order['payInfo'];
        $subOrders = $order['subOrders'];
        $statusInfo = $order['statusInfo'];
        $data = [
              'title'=>$subOrders[0]['itemInfo']['title'],
              'seller_name'=>$seller['shopName'],
              'price'=>$payInfo['actualFee'],
              'status'=>$statusInfo['text'],
        ];
        return $data;
    }

    public function zangdu1()
    {
        Db::startTrans();
        try{
            $user = User::where('id',1)->find();
            $user->nickname = 'hp_wm';
            $user->save();
            //var_dump(User::where('id',1)->find()->toArray());
            sleep(5);

            Db::commit();
            //Db::rollback();
            echo '处理完成';
        }catch (\Exception $e){
            Db::rollback();
            echo $e->getMessage();
        }

    }

    public function zangdu2()
    {
        Db::startTrans();
        try{
            $user = User::where('id',1)->find();
            if($user->nickname == 'hp_wm'){
                $user->nickname = 'hp_wm_zangdu';
                $user->save();
                echo '产生脏读了';
            }
            Db::commit();
            echo '处理完成';
        }catch (\Exception $e){
            Db::rollback();
            echo $e->getMessage();
        }
    }


    public function channelNum()
    {
        $a= 10000;
        $pri_account = 'Z0099';
        $child_account = 'Z99A00';
        for($i=0;$i<$a;$i++){
            $new = $this->getLastEn($pri_account,$child_account);
            $child_account = $new;
            echo $new.'<br />';
        }

    }

    public function getLastEn($pri_account,$child_account)
    {
        $english = get_english();

        if($child_account=='Z99Z99'){
            throw new \Exception('渠道编号已使用完！');
        }

//        $pri_account = 'C00005';
//        $child_account = 'C05A01';

        $first_en = substr($pri_account,0,1);//C
        $pri_flag = substr($pri_account,-2);//05


        $child_middle = substr($child_account,3,1);
        $child_middle_last = substr($child_account,-2);

        $next_two = $child_middle_last+1;

        if($next_two<10){
            $next_two = '0'.$next_two;
        }
        if($child_middle_last>=99){
            $current_key = array_search($child_middle,$english);
            if($current_key>=count($english)-1){
                throw new \Exception('子渠道编号已使用完，请联系技术检查');
            }
            $child_middle = $english[$current_key+1];
            $next_two = '00';
        }
        $new_channel_num = $first_en.$pri_flag.$child_middle.$next_two;
        return $new_channel_num;

    }

}