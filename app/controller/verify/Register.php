<?php


namespace app\controller\verify;

use app\Utils\DbUtils\UserUtils;
use think\exception\ValidateException;
use think\facade\Validate;

//注册验证，验证传来的数值是否正确
class Register
{
    public function index()
    {   //检验请求方式
        if (!request()->isPost())
            return "methoderror";
        //获得前端表单
        $params=request()->param();
        try {
            //查询是否有重复
            $checkDup = $this->checkDuplicate();
            //如果用户名重复,返回
            if (!$checkDup) return "userexisted";
            //验证数据格式  batch表示错误全部展示
            $check = validate(\app\validate\Register::class)->batch(true)->check(
                $params //前端传来的数组
            );
            //如果无重复且格式正确, 新增用户
            if ($check&$checkDup){
                UserUtils::insert(
                    request()->param('username'),
                    request()->param('password'),
                    request()->param('email'), 1);
                return "success";//新增成功
            }
            return "formaterror";//新增失败

        }catch (ValidateException $e){
            dump($e);//打印错误信息(由validate验证器定义)
        }
    }

    public function checkDuplicate()
    {
//        检查请求方式
        if (!request()->isPost())
            return "methoderror";
        $username = request()->param('username');
//        查重
        if (UserUtils::checkDuplicate($username)){
            return true;
        }else return false;
    }


}