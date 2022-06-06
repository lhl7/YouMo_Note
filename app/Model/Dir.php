<?php


namespace app\Model;

use think\Model;

class Dir extends Model
{
    //    切换数据库连接配置,切换的是database.php配置里的
    protected $connection='mkdemo';

    //    也可以定义使用哪张表,设置表名:
    protected $table='file_dir';//这样类名就可以取别的了

    //    设置主键,也就是主键是什么,默认主键是"id", 这个名称是对应的字段名,不受database中的前缀配置影响
    protected $pk='dir_id';


    //下面这些好像不写也行
    //    开启这个模型的时间戳自动写入, 且类型为datatime类型
    protected $autoWriteTimestamp = 'datetime';
    //     定义时间戳字段名 ,即匹配数据库中的字段
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
}