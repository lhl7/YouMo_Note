<?php


namespace app\controller\fileManage;


use app\middleware\PostCheck;
use app\Utils\DbUtils\UserUtils;
use think\exception\ValidateException;
use think\facade\Filesystem;

class ImageUp
{
    protected $middleware = [PostCheck::class];

    public static function index()
    {
        //image是前端传来的name值（参数值）
        $file = request()->file('image');
        $username = request()->param('username');
        //验证文件
        try {
            validate(['filecheck' => [
                'fileSize' => 3145728,//最多上传3M
                'fileExt' => 'jpg,png,gif,jpeg',//文件扩展名
                'fileMime' => 'image/jpeg,image/png,image/gif',//mime类型
            ]])->check(['filecheck' => $file]);//这个filecheck是验证规则名

            //上传文件
            //这里的disk里的参数是配置文件中的public组，写入的路径是配置文件里的路径
            // putfile第一个参数是生成的第一个文件夹名字，file是文件，rule是文件命名规则,这个文件会放在某个文件夹下
            $savename = Filesystem::disk('public')->putFile($username, $file);
            //返回的名字： User1/d2\1f722236d946fd98536ba805de31ed1ac2f4f8.jpg
            //7b是生成的 使用哈希算法会自动取文件哈希值前两个字符作为目录名

            //得到路径，这个函数里的disk是配置文件中的public组，name是指要获得哪个配置参数，这里获得了url参数
            $url = \think\facade\Filesystem::getDiskConfig('public', 'url') . '/' . str_replace('\\', '/', $savename);
            //返回的名字：/FileImage/User1/d2/1f722236d946fd98536ba805de31ed1ac2f4f8.jpg

            if (!$savename) {
                return json(['imgUrl' => '', 'status' => 0, 'msg' => '上传失败']);
            }

            $serverIp = 'http://lhl2507.cn';
            // $serverIp = 'http://10.21.145.59';
//            echo $serverIp.$url;
            return json(['imgUrl' => $serverIp . $url, 'status' => 1, 'msg' => '上传成功']);
            //类型不允许
        } catch (ValidateException $e) {
            return json(['imgUrl' => '', 'status' => 0, 'msg' => $e->getMessage()]);
        }
    }

    public static function delete()
    {
        $imageArr =  (request()->param('imageArr'));
        for ($i = 0; $i < count($imageArr); $i++) {
//            echo "../public/FileImage/" . $imageArr[$i];
            $isMatched = preg_match('/\.\.\//', $imageArr[$i], $matches);
            if ($isMatched !== 0) {
                return false;
            }
            unlink("../public/FileImage/" . $imageArr[$i]);
        }
        return true;
//        $str = 'Visitor/68/2612038fac6ef4e9ceb553bba626173f937a39.png';
//
//        echo "../public/FileImage/" . $str;
//        unlink("../public/FileImage/".$str);
    }


}