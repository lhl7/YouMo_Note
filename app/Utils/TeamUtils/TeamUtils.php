<?php


namespace app\Utils\TeamUtils;


use app\Model\Team;
use app\Model\User;
use app\Model\User_Team;
use app\Utils\DirUtils\DirSqlUtils;
use app\Utils\RandomID;
use app\validate\TeamNameCheck;
use think\facade\Session;

class TeamUtils
{
    //1.新增团队
    public static function createTeam($team_name,$creator_name)
    {
        //检查名字重复或合法
        if (self::checkDuplicte($team_name)===false||
            validate(TeamNameCheck::class)->batch(false)->check(
                ['team_name'=>$team_name])===false)
            return false;
        $team = new Team();
        $team->team_name=$team_name;
        $team->team_id=RandomID::getRandomID();
        $team->team_name=$team_name;
        $team->creator_name=$creator_name;
        $team->create_time=date('Y-m-d H:i:s', time());
        $team->save();
        //一开始没id,所以先保存,再查询,拼id
        $team->team_cloud ="Team".self::getId($team_name)."_$team_name";
        $team->save();
        if (self::join($team->team_id,$creator_name))
        return $team->team_id;
        else return false;

    }

    //2.解散团队,从两个表都删除team,还要删团队的文件夹
    public static function disband($team_name,$team_id,$username)
    {
        $team=self::getTeam($team_name,$team_id);
        if ($team===null||$username!==$team->creator_name)//检验是否有权删除
            return false;
        $team->delete();
        User_Team::where('team_id',$team_id)->delete();
        return DirSqlUtils::deleteAll($team_name,'TEAM','');
    }

    //3.用户加入团队,检验名字合法性
    public static function join($team_id,$username)
    {
        $team=Team::where("team_id",$team_id)->find();
        $checkExist=(self::getUser_Team($username,$team_id)===null);//如果是true,就是没加过,false就是重复加入了
        if ($team===null||$checkExist===false) return false;//团队不存在或用户重复加入
        $user_Team = new User_Team();
        $user_Team->username=$username;
        $user_Team->team_name=$team->team_name;
        $user_Team->team_id=$team_id;
        $user_Team->create_time=date('Y-m-d H:i:s', time());
        return $user_Team->save();
    }

    //4.用户退出团队
    public static function exit($team_id,$username)
    {
        $team_user=self::getUser_Team($username,$team_id);
        if ($team_user===null) return false;
        else return  $team_user->delete();
    }

    //5.返回用户所在的团队及团队的所有信息
    public static function getAllTeamInfo($username)
    {
        $team=User_Team::where('username',$username)->find();//查询用户是否有队
        if ($team===null) return false;
        $team_ids=User_Team::where('username',$username)->column('team_id');
        $arr=array();
        for ($i=0;$i<count($team_ids);$i++){
            array_push($arr,self::teamInfo($team_ids[$i]));
        }
        return json($arr);
    }

    //6.返回用户所在的团队
    public static function getAllTeam($username)
    {
        $team_name=User_Team::where('username',$username)->column('team_name');
        return $team_name;
    }

    //返回一个团队的信息
    public static function teamInfo($team_id)
    {
        $team=Team::where('team_id',$team_id)->find();
        if ($team===null) return false;
        return array(
            'teamName'=>$team->team_name,
            'team_id'=>$team->team_id,
            'creater'=>$team->creator_name,
            'createTime'=>$team->create_time,
            'members'=>self::getUserList($team_id)
        );
    }


    //返回某团队中的所有用户及邮箱
    public static function getUserList($team_id)
    {
        //team是一个user数组
        $team=User_Team::where('team_id',$team_id)->column('username');
        $arr=array();
        for ($i=0;$i<count($team);$i++){
            $email = User::where('mk_username', $team[$i])->value('mk_email');
            $array = array('userName' => $team[$i],'userEmail'=>$email);
            array_push($arr,$array);
        }
        return $arr;
    }

    //返回一个TeamModel
    public static function getTeam($team_name,$team_id)
    {
        return Team::where("team_name",$team_name)->where("team_id",$team_id)->find();
    }

    //得到Team的id,用于cloudname
    public static function getId($team_name)
    {
        return Team::where("team_name",$team_name)->value("id");
    }

    //返回一个用户和一个团队的关系
    public static function getUser_Team($username,$team_id)
    {
        return User_Team::where('username',$username)
            ->where('team_id',$team_id)->find();
    }

    //检查团队名是否重复
    public static function checkDuplicte($team_name)
    {
        if (Team::where("team_name",$team_name)->find()===null)
            return true;//无重复,返回true
        else return false;//有重复
    }




    //更新团队 删除
//    public static function update($team_name,$new_name)
//    {
//        //团队名不存在或者更新的名字重复
//        $team=Team::where("team_name",$team_name)->find();
//        if (self::checkDuplicte($new_name)===false||$team===null) return false;
//        $team->team_name=$new_name;
//        return $team->save();
//    }
}