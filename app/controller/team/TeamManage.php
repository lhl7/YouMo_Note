<?php


namespace app\controller\team;


use app\middleware\PostCheck;
use app\middleware\UserSession;
use app\Utils\TeamUtils\TeamUtils;
use think\facade\Session;

class TeamManage
{

    //控制器调用中间件方法:
    protected $middleware = [PostCheck::class];
//    因为接口参数设计问题,只能给每一个方法都让他检查session
//    protected $middleware = [UserSession::class];

    public static function checkLogin($username)
    {
        return Session::has($username);
//        return true;//测试
    }

    public static function createTeam()
    {
        $team_name = request()->param('team_name');
        $creator_name = request()->param('creator_name');

        //判断session状态
        if (!self::checkLogin($creator_name)){//如果未登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);}

        return TeamUtils::createTeam($team_name, $creator_name);

    }

    public static function disbandTeam()
    {
        $team_name = request()->param('team_name');
        $team_id = request()->param('team_id');
        $username = request()->param('username');
        //判断session状态
        if (!self::checkLogin($username)){//如果未登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);}

        return TeamUtils::disband($team_name, $team_id, $username);
    }

    public static function joinTeam()
    {
        $team_id = request()->param('team_id');
        $username = request()->param('username');

        //判断session状态
        if (!self::checkLogin($username)){//如果未登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);}
        return TeamUtils::join($team_id, $username);
    }

    public static function exitTeam()
    {
        $team_id = request()->param('team_id');
        $username = request()->param('username');

        //判断session状态
        if (!self::checkLogin($username)){//如果未登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);}

        return TeamUtils::exit($team_id, $username);
    }

    public static function teamInfo()
    {
        $username = request()->param('username');

        //判断session状态
        if (!self::checkLogin($username)){//如果未登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);}

        //把团队名字加到Session里面，不然访问不了团队文件。
        $TeamList = TeamUtils::getAllTeam($username);
        //如果他有团队
        if (!empty($TeamList)){
            foreach ($TeamList as $Teamname) {//把每个团队的键都放到session里，使其可以得到文件列表
                Session::set($Teamname,"hadLogin");
            }
        }
        return TeamUtils::getAllTeamInfo($username);
    }


}