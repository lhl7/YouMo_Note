<?php

declare (strict_types=1);

namespace app\validate;

//目录检查合法
trait DirNameCheck
{
    public static function isLegal(string $filename)
    {
        $str = "\/:*?\"<>|#&$^.%'";#定义你认为是特殊字符的字符
        //如果相似程度>0说明有特殊字符
        if (similar_text($filename, $str) > 0||mb_strlen($filename)>20||mb_strlen($filename)<1){
            return false;//false不合法
        }else return true;//true合法
    }
}

//php检测非法字符的一种方法
//        $illegal_character = "#['!`~\/\\\%^&*()+=\$\#:;<>\]\[{}]#";
//        $tname = "123#456";
//        if (preg_match($illegal_character, $tname)) {
//            var_dump('非法字符');
//            die;
//        } else {
//            var_dump('正常字符');
//            die;
//        }