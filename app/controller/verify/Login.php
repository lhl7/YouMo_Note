<?php


namespace app\controller\verify;


use app\Utils\DbUtils\UserUtils;
use think\facade\Cookie;
use think\facade\Session;

class Login
{
    public function index()
    {
        if (!request()->isPost())
            return "methoderror";
        $username = request()->param('username');
        $password = request()->param('password');
        if (UserUtils::checkPassword($username,$password)!=="nonExisted"&&
            UserUtils::checkPassword($username,$password)!=="wrongPassword"){
            //session是键值对，前面是键后面是值
            if (!Cookie::has('PHPSESSID')){//判断他是否有session
                session($username,"hadLogin");//没session，给他新session
            }else{//有session
                
                if (!Session::has($username)){//session里没有他的信息
                    session($username,"hadLogin");//加上登录状态
                }
            }
        }
            return UserUtils::checkPassword($username,$password);
    }
}