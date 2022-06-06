<?php


namespace app\validate;

//文件名检查合法
trait FileNameCheck
{
    public static function isLegal(string $filename)
    {
        //合法后缀
        $legal_suffix=array('md','txt');

        $arr = explode(".", $filename);
        $name = "";
        $suffix = $arr[count($arr) - 1];
        for ($i = 0; $i < count($arr) - 1; $i++) {
            $name = $name.$arr[$i].".";
        }
        $name=substr($name,0,strlen($name)-1);
        //严格比较
        if (in_array($suffix,$legal_suffix,true)&&DirNameCheck::isLegal($name)){
            return true;//名字合法返回true
        }else return false;//不合法 false

    }

}