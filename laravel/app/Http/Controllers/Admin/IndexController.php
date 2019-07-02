<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //所有数据显示界面
    public function index(){
        //get请求  访问:域名/路由规则
        return view('Admin.Index.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加操作表单界面
    public function create(){
        //get请求  访问:域名/路由规则/create
        return view('Admin.Index.add');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //接收由create传来的数据 执行添加操作
    public function store(Request $request){
        //post请求
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //显示单条数据操作
    public function show($id){
        //访问方式: 虚拟主机/控制器/id
        echo '显示的这条数据id为'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改数据表单页面
    public function edit($id){
        //访问方法: 虚拟主机/控制器/id/方法名(edit)
        return view('Admin.Index.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //处理修改数据页面
    public function update(Request $request, $id){
      //跳转方法: 控制器/id
      echo '需要修改的id为'.$id;
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //   访问方法(提交跳转地址):虚拟主机/控制器/id
        echo '这是删除操作删除id为'.$id;
    }
    //不是资源控制器自己创建的方法 不能用resource方式
    public function aa(){

    }
}
