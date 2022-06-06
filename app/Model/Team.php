<?php


namespace app\Model;

use think\Model;

class Team extends Model
{
    //    切换数据库连接配置,切换的是database.php配置里的
    protected $connection='mkdemo';

    //    也可以定义使用哪张表,设置表名:
    protected $table='mk_teams';//这样类名就可以取别的了

    //    设置主键,也就是主键是什么,默认主键是"id", 这个名称是对应的字段名,不受database中的前缀配置影响
    protected $pk='id';

    protected $autoWriteTimestamp = false;//如果开了自动写入时间戳,那createtime和updatetime就都要有

    //     定义时间戳字段名 ,即匹配数据库中的字段
//    protected $createTime = 'create_time';
}