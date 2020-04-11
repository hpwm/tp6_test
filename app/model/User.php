<?php


namespace app\model;


use think\db\Query;
use think\Model;

class User extends Model
{
//    public static function __make(Query $query)
//    {
//        return (new self())->setQuery($query);
//    }

    public function route()
    {
        return 'model-route';
    }
}