<?php
/**
 * Created by PhpStorm
 * User: Administrator
 * Date: 2020/4/11
 * Time: 17:19
 **/

namespace app\controller;


class Comment
{
    public function read($id,$blog_id)
    {
        return 'resoure-id-'.$id.'---blog_id-'.$blog_id;
    }
}