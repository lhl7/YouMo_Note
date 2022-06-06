<?php


namespace app\controller;


use app\BaseController;

class extendCon extends BaseController
{
    public function index()
    {
        //方便测试
        halt("中断输出");

        return '方法名:$this->request->action()'.'实际路径:$this->app->getBasePath()';
    }

}