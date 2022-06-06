<?php


namespace app\controller\userManage;


use app\middleware\AdminSession;
use app\middleware\PostCheck;
use app\middleware\UserSession;
use app\Utils\DbUtils\UserUtils;
use app\Utils\DbUtils\UserJsonCreate;

class GetUserList
{
    protected $middleware = [AdminSession::class,PostCheck::class];
    //返回用户列表
    public static function index()
    {
        return UserJsonCreate::getAllUsers();
    }

    //操作用户
    public static function action()
    {
        //获得方法名和用户名
        $method = request()->param('methodname');
        $username = request()->param('username');
        $status="success";
        switch ($method){
            case "deleteUser"://删除用户
                if (!UserUtils::delete($username)) $status="deleteFail";
                break;

            case "editUser"://更新用户
                $id = request()->param('id');
                $password = request()->param('password');
                $enabled = request()->param('enabled');
                $email = request()->param('email');
                if (!UserUtils::update($id,$username,$password,$email,$enabled)) $status="updateFail";
                break;

            case "createUser"://新增用户
                $password = request()->param('password');
                $enabled = request()->param('enabled');
                $email = request()->param('email');
                if (!UserUtils::insert($username,$password,$email,$enabled)) $status="createFail";
                break;
            default:
                return "methodError";
        }
        return $status;
    }
}