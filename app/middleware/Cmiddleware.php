<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/1/10
 * Time: 13:51
 **/

namespace app\middleware;


class Cmiddleware
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next,$params)
    {
        //
        //var_dump($request->param());
        if(true){
            return json(['code'=>400,'msg'=>'中间件']);
        }
        return $next($request);
    }
}