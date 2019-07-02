<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;  //Model低层模型类

class UserModel extends Model
{
    //与模型关联数据表
    protected $table='member';
    //主键设置
    protected $primary = 'id';
    //是否开启自动维护时间戳 false为关闭
    public $timestamps = true;

    //批量赋值属性 属性必须写 不然无法赋值
    protected $fillable = ['username','password','status','phone','email','token','created_at','updated_at'];

    //修改器 修改 Eloquent 模型中的属性或者设置它们的值
    public function getStatusAttribute($value){
        $status = ['0'=>'禁用','1'=>'开启'];
        return $status[$value];
    }



    //关联方法 一对一关联Usermodel和UserinfoModel
    //App\Model\UserinfoModel 要关联的模型类  member_id关联字段
    public function info(){
        return $this->hasOne('App\Model\UserinfoModel','member_id');
    }

    //一对多关联  关联Usermodel 和Useraddressmodel
    public function address(){
        return $this->hasMany('App\Model\UseraddressModel','member_id');
    }
}
 