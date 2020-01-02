<?php


namespace app\controller;


class Bar
{
    private $name = '我是bars';

    public function __get($name)
    {
        return $this->$name;
    }
}