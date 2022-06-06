<?php


namespace app\Utils\DbUtils;


use app\Model\User;
use app\Utils\DirUtils\DirSqlUtils;


class UserUtils
{
    //新增数据
    public static function insert($username, $password, $email = 'attacked@qq.com', $enabled = 1): bool
    {
        $user = new User();
        $user->mk_username = $username;
        $user->mk_password = $password;
        $user->mk_email = $email;
        $user->mk_enabled = $enabled;
        return $user->save();

//        模型新增也提供了 replace()方法来实现 REPLACE into 新增；
//        $user->replace()->save();
    }

    //更新用户
    public static function update($id, $username, $password, $email = 'attacked@qq.com', $enabled = 1): bool
    {
        $user = User::where('mk_id', $id)->find();
        $user->mk_username = $username;
        $user->mk_password = $password;
        $user->mk_email = $email;
        $user->mk_enabled = $enabled;
        return $user->save();
    }

    //删除用户
    public static function delete($username): bool
    {
        $user = User::where('mk_username', $username)->find();
        if ($user === null)
            return "nonExisted";
        $user->delete();
        return DirSqlUtils::deleteAll($username,'USER','');
    }

    public static function getId($username)
    {
        return User::where('mk_username', $username)->value('mk_id');
    }

    //查重
    public static function checkDuplicate($username)
    {
        $user = User::where('mk_username', $username)->find();
        if ($user === null) {
            //如果没找到相同用户名,则成功
            return true;
        } else return false;//否则失败
    }

    //校验密码
    public static function checkPassword($username, $password)
    {
        //查看user是否存在
        $user = User::where('mk_username', $username)->find();
        if ($user === null) return "nonExisted";

        else {//若存在比较密码
            $passwordvalue = User::where('mk_username', $username)->value('mk_password');

            //密码正确返回json
            if ($password === $passwordvalue) {
                return UserJsonCreate::loginJson($username);
            } else return "wrongPassword";
        }
    }

}

