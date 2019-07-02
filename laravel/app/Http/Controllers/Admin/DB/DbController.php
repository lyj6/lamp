<?php

namespace App\Http\Controllers\Admin\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;//引入数据库类
class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {   
    //数据库基操
        //查询数据库
         $list = DB::select('select * from lyj');
        //插入操作
        // $res = DB::insert(" insert into lyj(name,sex,age) value('zz3',0,20);");
        //更新操作
        // DB::update("update lyj set name='zby250'where id=1");
        //删除操作
        $res = DB::delete("delete from lyj where id=11");//返回值是影响行条数
        //一般语句
        // DB::statement('drop table lyj'); 删除表
    
        //************** 构造器的增删改查 ***************
        //插入单条数据
        // DB::table('lyj')->insert(['name'=>'小刘','age'=>19,'sex'=>0]);
        //插入多条数据
        // DB::table('lyj')->insert([['name'=>'小1','age'=>19,'sex'=>0],
        //     ['name'=>'小3','age'=>19,'sex'=>0],
        //     ['name'=>'小2','age'=>19,'sex'=>0]
        //     ]);
        
        //获取插入的id
        //$id = DB::table('lyj')->insertGetId(['name' => 'bayba','sex'=>0,'age'=>10]); 
        
        //修改数据
        DB::table('lyj')->where('id','=',1)->update(['name'=>'zby']);

        //删除数据
        DB::table('lyj')->where('id','=',9)->delete();

        //查询所有数据
        $get = DB::table('lyj')->get();
        //获取单条数据
        $get = DB::table('lyj')->where('id','=',1)->first();
        // var_dump($get);
        
        //获取某条数据中的某个值
        $get = DB::table('lyj')->where('id','=',1)->value('name');
        // var_dump($get);

        //将数据中的某一列拿出来
        $get = DB::table('lyj')->pluck('name');
        // var_dump($get);

        //连贯操作 
        $a = DB::table('lyj')->select('name','age')->get();
        var_dump($a);

        //条件 where()  wherein(字段,找这些) 
        $a= DB::table('lyj')->where('age','>',20)->get();
        // var_dump($a);
        $a= DB::table('lyj')->wherein('age',[1,10,19])->get();
        // var_dump($a);
        //where()->orWhere() 双重筛选
        $a= DB::table('lyj')->where('age','>',20)->orWhere('sex','=','1')->get();
        // var_dump($a);
        
        //升序降序 orderBy desc降序  asc升序
        $a = DB::table('lyj')->orderBy('age','desc')->get();  
        $a = DB::table('lyj')->orderBy('age','asc')->get();
        
        //分组查询操作
        $res = DB::table('lyj')->groupBy('name')->having('age', '>', 20)->get();
     
        //分页操作  paginate('每页显示数')
        $page = DB::table('lyj')->paginate(3);
        
        //关联表 lyj表和stu表关联 join('另一个表名',)
        $b = DB::table('lyj')->join('stu','lyj.id','=','stu.lyj_id')->get();
        // var_dump($b);
        // var_dump($page);
        //引入数据库视图
        return view('Admin.Db.index',['arr'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
