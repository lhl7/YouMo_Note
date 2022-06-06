<?php


namespace app\Utils\DirUtils;


class FileUtils
{
    //是新建在public目录下，所以我们要建在public的前两层，就是和项目同级
    private static $CloudPath = "../../CloudsSpace";

    //path:  /UserSpace/User23_syd/dir1 .....
    public static function createFile($dirname,$path)
    {
        $path = self::$CloudPath . $path;
        $file=fopen($path.$dirname,"w") or die("Unable to open file!");
        return fclose($file);
    }

    public static function getContent($dirname,$path)
    {
        $path = self::$CloudPath . $path;
        return file_get_contents($path.$dirname);
    }

    //更新文件内容
    public static function updateContent($dirname,$path,$new_content)
    {
        $path = self::$CloudPath . $path;
        $file=fopen($path.$dirname,"w") or die("Unable to open file!");
        $byte=fwrite($file, $new_content,1048576);//规定文件最多1MB(1048576byte),fwrite会返回写入的字节数
        if ($byte===false) return false;
        else
        return fclose($file);
    }

    //删除文件
    public static function deleteFile($dirname,$path)
    {
        $path = self::$CloudPath . $path;
        return unlink($path.$dirname);
    }

}