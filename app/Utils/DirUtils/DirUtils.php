<?php


namespace app\Utils\DirUtils;


//真实文件夹操作类
class DirUtils
{
    //是新建在public目录下，所以我们要建在public的前两层，就是和项目同级
    private static $CloudPath = "../../CloudsSpace";

    //path:  /UserSpace/User23_syd/dir1 .....
    public static function createDir($dirname, $path)
    {
        $path = self::$CloudPath . $path;
        if (!file_exists($path . $dirname)) {
            return mkdir($path . $dirname, 0777, false);
        } else
            return false;
    }

    public static function renameDir($dirname, $path, $new_name)
    {
        $path = self::$CloudPath . $path;
        return rename($path . $dirname, $path . $new_name);
    }


    //$path = 实例格式 '/www/tmp';
    //清空文件夹函数和清空文件夹后删除空文件夹函数的处理
    public static function deletedir($path)
    {
        $dirName = self::$CloudPath.$path;
        if (file_exists($dirName)) {//判断目录是否存在
            //如果是目录，那么我们就遍历下面的文件或者目录
            //打开目录句柄
            $dir = opendir($dirName);
            while ($fileName = readdir($dir)) {
                //不运行像上级目录运行
                if ($fileName != "." && $fileName != "..") {
                    $file = $dirName . "/" . $fileName;
                    if (is_dir($file)) {
                        self::deleteDir($file);//使用递归删除目录
                    } else {
                        unlink($file);
                    }
                }
            }
            closedir($dir);//关闭dir
            if (rmdir($dirName)) return true;
        }
        return false;
    }
}

