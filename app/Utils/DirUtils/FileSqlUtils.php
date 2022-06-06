<?php


namespace app\Utils\DirUtils;


use app\controller\fileManage\FileManage;
use app\Model\Dir;
use app\Utils\DbUtils\UserUtils;
use app\Utils\TeamUtils\TeamUtils;
use app\validate\DirNameCheck;
use app\validate\FileNameCheck;
use think\Model;


//文件数据库crud类
class FileSqlUtils
{
    protected static $cloud_name;

    public static function insert($creator_name, $dir_name, $dir_type, $creator_type, $path): bool
    {
        //1.先判断用户还是团队，并改变路径
        //如果在根目录下创建
        if ($path === '') {
            $path = self::getPath($creator_name, $creator_type, $path);
            if (self::ifDuplicate($creator_name, $dir_name, $dir_type, $creator_type, $path) === false
                || FileNameCheck::isLegal($dir_name) === false)
                return false;
        } else {//如果不在根目录下创建
            $path = self::getPath($creator_name, $creator_type, $path);
//            echo (self::ifDuplicate($creator_name, $dir_name, $dir_type, $creator_type, $path) === true).";";
//            echo (FileNameCheck::isLegal($dir_name) === true).";";
//            echo (self::isDirExist($creator_name, $dir_name, $dir_type, $creator_type, $path) === true).";";
            //2.如果文件重复、名字不合法、路径不存在、则新增失败
            if (self::ifDuplicate($creator_name, $dir_name, $dir_type, $creator_type, $path) === false
                || FileNameCheck::isLegal($dir_name) === false
                || self::isDirExist($creator_name, $dir_name, $dir_type, $creator_type, $path) === false)
                return false;
        }

        //3.如果用户第一次建文件，则为其分配基础云盘空间
        $FirstDir = Dir::where('cloud_name', self::$cloud_name)->find();
        if ($FirstDir === null) {//第一次创建文件夹
            //分配文件夹空间
            DirUtils::createDir('', $path);
        }

        //4.储存到数据库
        $dir = new Dir();
        $dir->creator_name = $creator_name;
        $dir->dir_name = $dir_name;
        $dir->dir_type = $dir_type;
        $dir->creator_type = $creator_type;
        $dir->path = $path;
        $dir->cloud_name = self::$cloud_name;
        $dir->save();


        //5.为用户创建文件夹
        if ($dir_type === 'FILE') {
            return FileUtils::createFile("/" . $dir_name, $path);
        }
        return false;

    }

    //重命名数据库中的文件名+重命名真实文件名
    public static function reName($creator_name, $dir_name, $dir_type, $creator_type, $path, $new_name): bool
    {
        //1、改路径
        $path = self::getPath($creator_name, $creator_type, $path);
        //2、查看原文件是否存在
        $dir = self::getDir($creator_name, $dir_name, $dir_type, $creator_type, $path);
        if ($dir === null
            //3、查看新名字是否重复、是否合法
            || self::ifDuplicate($creator_name, $new_name, $dir_type, $creator_type, $path) === false
            || FileNameCheck::isLegal($new_name) === false)
            return false;
//        4.修改数据库数据
        $dir->update_time = date('Y-m-d H:i:s', time());//更改数据库中的文件更新时间
        $dir->dir_name = $new_name;
        $dir->save();
        //5.重命名真实文件夹
        return DirUtils::renameDir("/" . $dir_name, $path, "/" . $new_name);
    }

    //删除数据库中的文件+删除真实文件
    public static function delete($creator_name, $dir_name, $dir_type, $creator_type, $path)
    {
        $path = self::getPath($creator_name, $creator_type, $path);
        $num = Dir::where('creator_name', $creator_name)
            ->where('creator_type', $creator_type)
            ->where('dir_name', $dir_name)
            ->where('dir_type', $dir_type)
            ->where('path', $path)->delete();
        if ($num === 0)
            return false;
        return FileUtils::deleteFile("/" . $dir_name, $path);

    }

    //返回文件内容
    public static function getContent($creator_name, $dir_name, $dir_type, $creator_type, $path)
    {
        $path = self::getPath($creator_name, $creator_type, $path);
        $dir = self::getDir($creator_name, $dir_name, $dir_type, $creator_type, $path);
        if ($dir === null) return false;
        return json(FileUtils::getContent("/$dir_name", $path));
    }

    //更新(编辑)文件内容
    public static function updateContent($creator_name, $dir_name, $dir_type, $creator_type, $path, $new_content)
    {
        $path = self::getPath($creator_name, $creator_type, $path);
        $dir = self::getDir($creator_name, $dir_name, $dir_type, $creator_type, $path);
        if ($dir === null) return false;
        $dir->update_time = date('Y-m-d H:i:s', time());//更改数据库中的文件更新时间
        $dir->save();
        return FileUtils::updateContent("/$dir_name", $path, $new_content);
    }

    //文件名查重
    public static function ifDuplicate($creator_name, $dir_name, $dir_type, $creator_type, $path): bool
    {
        $dir = self::getDir($creator_name, $dir_name, $dir_type, $creator_type, $path);
        if ($dir === null) return true;//无重复返回true
        else return false;//有重复返回false
    }

    //得到文件在数据库
    public static function getDir($creator_name, $dir_name, $dir_type, $creator_type, $path)
    {
        return Dir::where('creator_name', $creator_name)
            ->where('creator_type', $creator_type)
            ->where('dir_name', $dir_name)
            ->where('dir_type', $dir_type)
            ->where('path', $path)->find();
    }

    //判断路径是否存在
    public static function isDirExist($creator_name, $dir_name, $dir_type, $creator_type, $path)
    {
        $arr = explode("/", $path);
        $newpath = "";
        $dir_name = $arr[count($arr) - 1];
        for ($i = 1; $i < count($arr) - 1; $i++) {
            $newpath .= "/" . $arr[$i];
        }
//        echo $dir_name.";";
//        echo $newpath;

        if (Dir::where('creator_name', $creator_name)
                ->where('creator_type', $creator_type)
                ->where('dir_name', $dir_name)
                ->where('dir_type', 'DIR')//因为是找文件夹,所以肯定是DIR
                ->where('path', $newpath)->find() === null)
            return false; //没找到,返回false,就是不存在
        else return true;
    }

    //通过类型改路径
    public static function getPath($creator_name, $creator_type, $path)
    {
        if ($creator_type == 'USER') {
            self::$cloud_name = 'User' . UserUtils::getId($creator_name) . "_$creator_name";
            $path = "/UserSpace/" . self::$cloud_name . $path;
        } else if ($creator_type == 'TEAM') {
            self::$cloud_name = 'Team' . TeamUtils::getId($creator_name) . "_$creator_name";
            $path = "/TeamSpace/" . self::$cloud_name . $path;
        }
        return $path;
    }




}