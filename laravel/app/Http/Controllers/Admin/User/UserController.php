<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;//引入数据库类   导入模型类后就不需要数据库类
use Hash; //引入Hash 加密类
use App\Http\Requests\UseraddRequest; //引入请求类
use App\Model\UserModel; //导入模型类
use A;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //方法一
        //获取搜索值 
        //$res = $request->input('seach');

        //将数据查找出来
        //$userlist = $db->where('username','like','%'.$res.'%')->get();

        //select * from user where username like %a% limit 2 2;
        //获取分页类
        //$userlist = DB::table('user')->where('username','like',"%".$res."%")->paginate(3);
        
        //引入模板 将公共页面继承过来  $request->all()获取导航栏所有数据
        //return view('Admin.User.user',['userlist'=>$userlist,'request'=>$request->all()]); 

        //方法二 使用模型类来导入  这用member数据表
        //操作模型类
        //$data = UserModel::get();
        //获取导航栏数据
        $res = $request->input('seach');
        $userlist = UserModel::where("username","like","%".$res."%")->paginate(2);
        //引入模板
        return view('Admin.User.user',['userlist'=>$userlist,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

        //添加用户页面
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UseraddRequest $request)
    {
        //接收添加数据 接收导航栏数据
        //repassword 和_token删掉 使用except来 
        // $userlist = $request->except('repassword','_token');
        // //将status设置值
        // $userlist['status'] = 1;
        // $userlist['token'] = str_random(50);
        // //将密码进行Hash加密
        // $userlist['password'] = Hash::make($userlist['password']);
        // //将数据添加进数据库
        // $res = DB::table('user')->insert($userlist);
        // if($res){
        //    //成功跳转回列表页面
        //    return redirect('/user')->with('success','添加成功');
        // }else{
        //  return back()->with('error','添加失败');
        // }

        //使用模型类来设置
        //repassword 和_token删掉 使用except来 
        $userlist = $request->except('repassword','_token');
        //将status设置值
        $userlist['status'] = 0;
        //将密码进行Hash加密
        $userlist['password'] = Hash::make($userlist['password']);
        var_dump($userlist);
        // //将数据添加进数据库 模型类使用create进行插入
        $res = UserModel::create($userlist);
        if($res){
           //成功跳转回列表页面
           return redirect('/user')->with('success','添加成功');
        }else{
           return back()->with('error','添加失败');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //获取关联表数据
    public function show($id)
    { 
        //调用关联数据
        $userinfo = UserModel::find($id)->info;
        // var_dump($userinfo);
       return view('Admin.User.info',['userinfo'=>$userinfo]);
    }


    //添加收货地址方法
    public function address($id){
        // dd($id);
        //使用find来查找这条id下的用户数据
        $address = UserModel::find($id)->address;
        //加载模板
        return view('Admin.User.address',['address'=>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //得到要修改的数据
        //$find = DB::table('user')->where('id','=',$id)->first();
        // var_dump($find);
        //引入模板
        //return view('Admin/User/edit',['find'=>$find]);

        //方法二 使用模型类 
        //得到要修改的数据  单条数据就要使用find()
        $find = UserModel::find($id);
        //引入模板
        return view('Admin/User/edit',['find'=>$find]);
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
        //接收传来的数据
        // var_dump($id);
        //将多出来的数据出去
        $list = $request->except('_token','_method','repassword');
        //使用修改方式修改数据
        $res = DB::table('user')->where('id','=',$id)->update($list);

        //使用模型类 方法
        $res = UserModel::where('id','=',$id)->update($list);
        
        if($res){
            return redirect('/user')->with('success','修改成功');
        }else{
            return back()->with('error','修噶失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //接收删除ID
        // dd($id);
        // $res = DB::table('user')->where('id','=',$id)->delete();
        // if($res){
        //     return redirect('/user')->with('success','删除成功');
        // }else{
        //     return back()->with('error','删除失败');
        // }
        
        //方法二 使用模型类
        //接收删除ID
        // dd($id);
        $res = UserModel::where('id','=',$id)->delete();
        if($res){
            return redirect('/user')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
        
    }


    //调用自定义函数
    function a(){
        demo();
    }
    //调用自定义类
    function b(){
        $a = new A();
        $a->send();
    }

    //云之讯 调用自定义类
    function c(){
        send();
    }
    
}
