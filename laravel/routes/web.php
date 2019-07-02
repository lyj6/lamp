<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //引入页面 view
    return view('welcome');
});
//访问控制器里面的方法  ('路由规则','控制器@方法名') 注意在控制器里面有文件夹这里要加文件夹名 例如 Admin
Route::get('Admin/user','Admin\UserController@index')->middleware('login');
//或
// Route::get('Admin/user',['uses'=>'Admin\UserController@index']);


// 传值
Route::get('Admin/user/{id}','Admin\UserController@delete');

//登录界面
Route::get('dologin',function(){
     return view('dologin');
});

//使用路由组来使用控制器方法
// Route::group(['middleware'=>'login'],function(){
//     //子路由
//     Route::get('Admin/user','Admin\UserController@index');
//     //传值
//     Route::get('Admin/user/{id}','Admin\UserController@delete');
// });

//资源控制器 注意 在资源控制器新建的方法 需要使用普通方法访问
//把控制器里面的方法统统交给/index路由处理
//后面结合中间件
Route::resource('index','Admin\IndexController');

// 资源控制器结合路由组使用:
// Route::group(['middleware'=>'login'],function(){
//     Route::resource('index','Admin\IndexController');
// });


//请求
Route::resource('/brand','Admin\BrandController');

//文件上传路由
Route::resource('/file','Admin\FileController');

//获取cookie session
Route::resource('/cs','Admin\CSController');


//****************  视图 *************************
Route::resource('/view','Admin\ViewController');

/* 
1,控制器往视图传值
    return view('路由规则',['参数名1'=>'参数值1','参数名2'=>'参数值2']);
    视图里接收 {{$参数名}}
2,视图中使用函数
  例子:{{time()}}
3,设置默认值  {{$name or '默认值(当没有设置值时 默认走默认走)'}}

占位符:
    方法一
    @yield('占位符名字')
    方法二
    @section('占位符名字')
    @show

模板继承方法: @extends('要继承的路径') 

使用第一种占位符后给你设置的占位符赋值:
    例如在title出给了 @yield('title'),继承后的页面给自己title赋值
    就用section('title','你要设置的title值')

第二种占位符赋值 @section('占位符名')
                 @show
    当使用占位符放在头和尾之间,然后在继承页面使用
    @section('设置的名字')和@endsection将你要
    添加的主体内容部分放在他们两个中间
      
*/

//模板继承练习 搭建后台
Route::resource('/ex','Admin\Ex\ExController');

//点击添加用户跳转到这个控制器
Route::resource('/ext','Admin\Ex\ExtController');


//*******************  数据库操作 ********************
Route::resource('/db','Admin\DB\DbController');

/*注意点 当你没有修改配置文件时 遍历的是对象,不能使用
$value['键'] 这样使用 需要使用$value->键来打印

  <tr>  没有修改对象格式为数组时要用下面方法
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->sex}}</td>
                <td>{{$value->age}}</td>
 </tr> -->

2,操作数据库时必须引入DB类
 use DB;//引入数据库类
3,查询操作
   DB::select('select * from lyj');
4,插入操作  插入成功返回true
   DB::select('insert into lyj() value()');
5,删除操作 返回值为影响的条数
   DB::delete('delete from lyj where id = ');
6,修改操作 返回值为影响的条数
   DB::update('update lyj set name= new name where id= ');

7,一般语句 DB::statement('drop table lyj') 删除表

//构造器  增删改查
1,插入数据
插入单挑条据 
DB::table('lyj')->insert(['name'=>'zby','age'=>18])
插入多条数据
DB::table('lyj')->insert([['name'=>'zby','age'=>18],
['name'=>'zby','age'=>18],['name'=>'zby','age'=>18]
]);

获取插入id
DB::table('lyj')->insertGetid(['name'=>'zby','age'=>18]);

更新操作
DB::table('lyj')->where('id','=',1)->update(['name'=>new name]);

删除操作
DB::table('lyj')->where('id','=',1)->delete();

查程所有数据 get()
DB::table('lyj')->get();

查询单条数据 first();
DB::table('lyj')->where('id','=',1)->first();

获取取出一列数据中的某个值 value('你要取出来某个的值')
DB::table('lyj')->where('id','=',1)->value('name')

获取某一列数据 pluck
DB::table('lyj')->pluck(你要取出来的哪一列数据 例如name age);
*/



//*********************  实战开发后台 ************************
//后台首页控制器
Route::resource('/back','Admin\Back\BackController');
//用户列表控制器
Route::resource('/user','Admin\User\UserController');

//收货地址路由
Route::get('/useraddress/{id}','Admin\User\UserController@address');

/*
 用户列表方法总结:

  appends() 在搜索时候,查看下一页数据时 数据就会消失 这方法可以在导航栏追加搜索参数  

  用户添加方法: 多种请求方法用| 隔开
  请求类里面:required 表示不能为空
             regex 正则验证
  redirect()->with() 跳转同时传递session值
 */


//********************  模型类  *********************
/*
  1,模型就是操作数据库的工具 每个模型对应一个数据表 统称：ORM
  2,模型关联:
      一对一:用户模块->用户详情页
               商品模块->商品详情
      hasOne(其他模型,关联字段) 
      一对多:版块模块->帖子模块
             用户模块->收货地模块 
       hasMany(其他模型,关联字段) 

  使用模型类注意下面几点:
      0,由之前的DB::table() 改为 model名::方法 例如:UserModel::create();
      1,用户添加模块 添加操作不再是insert 改为create
      2,想要批量添加时 一定要在model类里面添加 protected $fillable = ['数据库字段1','数据库字段2']; 不然添加会报错
      3,修改操作里 由之前的first改为find来查找你要的字段 条件放在find('条件')
        例如:find($id)
      4,时间字段可以使用自动维护时间戳来设置 
          public $timestamps = true; false为关闭
      5,修改像0 1 这类型字段值时 你要需改为对应的值时(例如 1为开启 0为关闭)
      可以通过修改器来修改:
            public function getStatusAttribute($value){
                $status = ['0'=>'禁用','1'=>'开启'];
                return $status[$value];
            }


    命名空间namespace:命名空间是一种封装事物的方法,
       一般包含三大类型数据，常量 函数  类 

    框架里命名空间所在的路径和文件所在路径是一致的


    模块与模块详情一对一关联:
        1,详情表member_id要与member的id对应
        2,在member的Usermodel里面创建关联数据方法 info
         参数1:要关联的详情数据表 
         参数2:关联的数据
        public function info(){
          return $this->hasOne('App\Model\UserinfoModel','member_id');
        }
        3,点击用户详情时 将用户id传过去 在User控制器里面的show方法
        接收id,然后调用关联数据  info为在Usermodel关联数据的方法
             UserModel::find($id)->info;


 */


//*************  自定义函数和类 ****************
//自定义函数
Route::get('a','Admin\User\UserController@a');

//自定义类
Route::get('b','Admin\User\UserController@b');


//*****************  API接口 *******************
/*
  API接口常见有:支付宝支付api接口 
                发送邮件接口
                发送短信接口

  接口定义:封装功能函数体 类似于简历

  云之讯密码：424299399lyj
 */
//使用自定义类来调用
Route::get('c','Admin\User\UserController@c');

