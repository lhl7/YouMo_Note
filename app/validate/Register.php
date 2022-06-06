<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class Register extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username' => 'require|length:3,20|alphaDash', //3-20个字符以内，英文数字下划线破折号
        'email' => 'require|email', //邮箱格式要正确
        'password' =>'require|alphaDash|length:6,20',//英文数字下划线破折号
    ];

    protected $message = [
    ];
}
