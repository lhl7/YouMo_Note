<?php


namespace app\controller;


class HelloWorld
{

    public function index()
    {
        return "更换首页: hello world";
    }

    public function array()
    {
        return json(array(1=>1,2=>"hello"));
    }
}