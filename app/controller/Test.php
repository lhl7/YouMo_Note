<?php


namespace app\controller;


use app\controller\fileManage\FileManage;
use app\Utils\DbUtils\UserUtils;
use app\Utils\DbUtils\UserJsonCreate;
use app\Utils\DirUtils\DirSqlUtils;
use app\Utils\DirUtils\FileSqlUtils;
use app\Utils\DirUtils\DirUtils;
use app\Utils\RandomID;
use app\Utils\TeamUtils\TeamUtils;
use app\validate\DirNameCheck;
use app\validate\FileNameCheck;

class Test
{
//    index是控制器默认的方法 /test,可以不写
    public static function index(){

//        $check = DirSqlUtils::insert('test6', 'fie','DIR','USER', '');
//        $check = DirSqlUtils::deleteAll('test6', 'USER', '');
//        $check = FileSqlUtils::getContent("Visitor1","dir4.md",'FILE',"TEAM","");
//        $check = FileSqlUtils::insert("team3","TEAM3.md",'FILE',"TEAM","");
//        $check = TeamUtils::join("V0SVLoivz","Visitor");
//        $check = TeamUtils::exit("7Zy9Ab29b","s2yd");
//        $check = TeamUtils::createTeam("team4","s2yd");
//        $check = TeamUtils::getAllTeamInfo("Visitor");

//          $check = empty(TeamUtils::getAllTeam("test6"));
//
//          var_dump($check);
//        $check=RandomID::getRandomID();
//        $check=unlink("../public/FileImage/"."test5/d2/1f722236d946fd98536ba805de31ed1ac2f4f8.jpg");
//        $check=unlink("../public/FileImage/"."../../123.txt");
//        $str = 'Visitor/85/35fea7046f403f90bac75b0171ec63bd581741.png';
//        $isMatched = preg_match('/\.\.\//', $str, $matches);
//        unlink("../public/FileImage/" . $str);

//        $myfile = fopen("newfile.md", "w") or die("Unable to open file!");
//        $txt = '调?JavaScript## js调用问题';
//
//        fwrite($myfile, $txt,1048576);//规定文件最多1MB(1048576byte)
//        fclose($myfile);

    }


}