<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UseraddressModel extends Model
{
    //与模型关联数据表
    protected $table='member_address';
    //主键设置
    protected $primary = 'id';
    //是否开启自动维护时间戳 false为关闭
    public $timestamps = false;
}
