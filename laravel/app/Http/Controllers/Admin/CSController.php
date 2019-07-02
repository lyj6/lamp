<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //cookie操作 
        
        //设置cookie withCookie('名'，'值',过期时间)
        // return response('respon')->withCookie('key','value',0.5);
        // 输出cookie值
        echo $request->cookie('key'); //value

        //设置cookie值方法二
        // \Cookie::queue('key','value',0.1);
        echo \Cookie::get('key');

        //session操作
        session(['name'=>'zby','age'=>'18','sex'=>'男']);
        echo session('name');

        //获取所有session值
        var_dump($request->session()->all());

        //从 Session 中取出并删除数据 
        $request->session()->pull('sex');
        var_dump(session('sex')); //null

        //判断session中某个值是否存在has('名字');
        var_dump($request->session()->has('name'));

        //响应数据类型
        //1,字符串
        echo '返回字符串';
        //2,页面(模板)
        // return view('页面名称');
        //3,返回cookie值 上面例子
        //4,返回json
        // return response()->json(['zby'=>250,'zcc'=>666]);
        //5页面跳转
        return redirect('cs/create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo '跳转到我这里来';
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
