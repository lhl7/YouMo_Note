<?php


namespace app\Utils;


use app\Model\Team;

class RandomID
{
    //chars自己决定的随机搭配组合
    public static function getRandomID( $chars=null)
    {
        $len=9;
        if (is_null($chars)) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000*(double)microtime());
        while (true){
            for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++) {
                $str .= $chars[mt_rand(0, $lc)];
            }
            if (Team::where('team_id',$str)->find()===null)//找不到,无重复,则返回
                break;
        }
        return $str;
    }

}