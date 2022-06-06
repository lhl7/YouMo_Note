<?php


namespace app\Utils\DbUtils;


use app\Model\User;

class UserJsonCreate
{

//    $id=User::where('mk_us')->value("mk_id");
//    $password =User::where('mk_username', $username)->value('mk_password');

    public static function loginJson($username)
    {
        $email =User::where('mk_username', $username)->value('mk_email');
        $enabled = User::where('mk_username', $username)->value('mk_enabled');

        $arr=array("username"=>"$username","email"=>"$email","enabled"=>$enabled);
        //要用json()方法,不能用json_encode()方法,json()是框架里带的方法,人家的返回值里包括了一些响应头,
        //状态码,和自己拼起来的json字符串是完全不一样的,自己拼起来的就真是一个字符串.
        return json($arr);
    }

    public static function getAllUsers()
    {
        return json(User::field('mk_id,mk_username,mk_password,mk_email,mk_enabled')->select());
    }
}