<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/4/14
 * Time: 10:50
 **/

namespace app\controller;


use app\BaseController;
use app\model\User;
use think\facade\Cache;

class Redis extends BaseController
{
    //缓存穿透
    public function penetrate()
    {
        $id = $this->request->param('id',-1);
        $result = Cache::store('redis')->get($id);
        if($result){
            return json(['code'=>0,'data'=>$result]);
        }
        $res = User::where('id',$id)->findOrEmpty();
        if(!$res->isEmpty()){
            Cache::store('redis')->set($id,$res->id);
        }
        return json(['code'=>1,'data'=>$res->id]);
    }

    //缓存击穿
    public function breakthrough()
    {

    }

    //缓存雪崩
    public function snowslide()
    {

    }
}