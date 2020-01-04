<?php
declare (strict_types = 1);

namespace app\middleware;

use think\Response;

class Check
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
        return $next($request);
    }


    public function end(Response $response)
    {
        //不能有输出 echo 或者var_dump

//        ob_clean();
//        echo 22;
//        ob_get_contents();

        //file_put_contents('1.json',$response->getData());

    }
}
