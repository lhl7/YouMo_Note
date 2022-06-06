<?php


namespace app\controller\fileManage;


use app\middleware\PostCheck;
use app\middleware\UserSession;
use app\Utils\DirUtils\DirSqlUtils;
use app\Utils\DirUtils\DirUtils;
use app\Utils\DirUtils\FileSqlUtils;
use think\facade\Session;
use think\route\dispatch\Controller;

class FileManage
{
    //控制器调用中间件方法,如果调用多个中间件,用逗号隔开..
    protected $middleware = [PostCheck::class,UserSession::class];

    //或者继承controller类，然后直接写中间件名字。
//    protected $middleware = ['PostCheck'];



    public static function getList()
    {
        $creatorname = request()->param('userName');
        $creatortype = request()->param('userType');
        $path = request()->param('filePath');
        return DirSqlUtils::getDirsList($creatorname, $creatortype, $path);
    }

    public static function createDir()
    {
        $creator_name = request()->param('userName');
        $dir_name = request()->param('fileName');
        $dir_type = request()->param('fileType');
        $creator_type = request()->param('userType');
        $path = request()->param('filePath');
        if ($dir_type === 'DIR')
            return DirSqlUtils::insert($creator_name, $dir_name, $dir_type, $creator_type, $path);
        elseif ($dir_type === 'FILE')
            return FileSqlUtils::insert($creator_name, $dir_name, $dir_type, $creator_type, $path);
        return false;
    }

    public static function renameDir()
    {
        $creator_name = request()->param('userName');
        $dir_name = request()->param('fileName');
        $dir_type = request()->param('fileType');
        $creator_type = request()->param('userType');
        $path = request()->param('filePath');
        $new_name = request()->param('newName');
        if ($dir_type === 'DIR')
            return DirSqlUtils::reName($creator_name, $dir_name, $dir_type, $creator_type, $path, $new_name);
        if ($dir_type === 'FILE')
            return FileSqlUtils::reName($creator_name, $dir_name, $dir_type, $creator_type, $path, $new_name);
            return false;
    }

    public static function deleteDir()
    {
        $creator_name = request()->param('userName');
        $dir_name = request()->param('fileName');
        $dir_type = request()->param('fileType');
        $creator_type = request()->param('userType');
        $path = request()->param('filePath');
        if ($dir_type === 'DIR')
            return DirSqlUtils::delete($creator_name, $dir_name, $dir_type, $creator_type, $path);
        if ($dir_type === 'FILE')
            return FileSqlUtils::delete($creator_name, $dir_name, $dir_type, $creator_type, $path);
        return false;
    }

    public static function getContent()
    {
        $creator_name = request()->param('userName');
        $dir_name = request()->param('fileName');
        $dir_type = request()->param('fileType');
        $creator_type = request()->param('userType');
        $path = request()->param('filePath');
        return FileSqlUtils::getContent($creator_name, $dir_name, $dir_type, $creator_type, $path);
    }

    public static function updateContent()
    {
        $creator_name = request()->param('userName');
        $dir_name = request()->param('fileName');
        $dir_type = request()->param('fileType');
        $creator_type = request()->param('userType');
        $path = request()->param('filePath');
        $new_content = request()->param('newContent');

        return FileSqlUtils::updateContent($creator_name, $dir_name, $dir_type, $creator_type, $path, $new_content);
    }



}