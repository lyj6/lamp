<?php


//获取配置信息 Config
Route::get('/a',function(){
   // echo Config::get('app.timezone');
   //设置配置信息
   Config::set('app.timezone','PRC');
   echo Config::get('app.timezone');

   //获取环境配置 env(获取env里面的配置)
   echo env('DB_HOST');
});


//基本路由 get路由
Route::get('base', function () {
    return '基本路由';
});

//post 路由  MethodNotAllowedHttpException 没有匹配的post路由
Route::post('post', function () {
    return 'post路由';
});


// 参数限制 正则匹配 where(传递参数,正则)
Route::get('user/{name?}',function($name){
    return $name;
})->where('name','[A-Za-z]+');


//多值传递 + 正则限制
Route::get('user0/{name}/{id}',function($name,$id){
    echo $name.$id;
})->where(['name'=>'[A-Za-z]+','id'=>'[0-9]+']);


//路由别名
Route::get('user1',['as'=>'user2',function(){
        return '这是我的路由别名';
}]);

//通过路由别名获取原有路由
Route::get('user3',function(){
    //route laravel框架里的内置函数 通过路由别名来获取原有路由规则
     echo route('user2');
});

//路由组(路由推荐用法)
Route::group([],function(){
   
    Route::get('x0',function(){
        echo '第一个版块';
    });
    Route::get('x1',function(){
        echo '第二个版块';
    });
    Route::get('x2',function(){
        echo '第三个版块';
    });
});

//******************  csrf  *********************
//引入表单页面
Route::get('form',function(){
    return view('form'); 
});
//提交过来的数据 表单提交时缺乏CSRF保护 将报错
Route::post('doinsert',function(){
    
});

//******************  laravel ajax get请求 *******
Route::get('ajaxget',function(){
    return view('ajaxget');
});
//将值返回给ajax页面
Route::get('doajaxget',function(){
    return 'laravel ajax get请求方式';
});

//******************  laravel ajax post请求 *******
Route::get('ajaxpost',function(){
    return view('ajaxpost'); 
});
//将值返回给ajax页面
Route::post('doajaxpost',function(){
    return 'laravel ajax post请求方式';
});


//中间件结合路由 
//访问控制器方法时起一个筛选的作用

Route::get('list',function(){
    echo '这是后台友情链接';
})->middleware('login');

//没有session时到登录界面
Route::get('dologin',function(){
     return view('dologin');
});

//user 控制器与视图结合
Route::get('user/index','Admin/UserController@index');
//第二种写法
// Route::any('lyj',['uses'=>'UserController@index']);





//*****************  第二天  *******************


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


//资源控制器
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


//************************  第三天 ************************
//****************  视图 *************************
Route::resource('/view','Admin\ViewController');

/* 
1,控制器往视图传值
    return view('路由规则',['参数名1'=>'参数值1','参数名2'=>'参数值2']);
    视图里接收 {{$参数名}}
2,视图中使用函数
  例子:{{time()}}
3,设置默认值  {{$name or '默认值(当没有设置值时 默认走默认)'}}

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
//Db控制器
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
