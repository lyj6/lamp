<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserinfoModel extends Model
{
    //与模型关联数据表
    protected $table='member_info';
    //主键设置
    protected $primary = 'id';
    //是否开启自动维护时间戳 false为关闭
    public $timestamps = false;

}
