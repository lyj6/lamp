<?php

namespace App\Http\Controllers\Admin;

//导入请求类
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Request请求类 $request 请求对象
    //声明请求对象
    public function index(Request $request){

       //获取请求路径
       $path = $request->path();//brand
       
       //完整url地址
       $url = $request->url();//http://www.yj.com/brand

       //获取请求方式
       $method = $request->method(); //GET

       //检查请求方式  如果是isMethod('传输方式')返回true
       $ismethod = $request->isMethod('GET');


       //获取导航栏传过来的数据
       $data = $request->all();
       //取单个数据 有数据的话返回数据 没有返回null
       $input = $request->input('name');
       //取出你要的几个数据
       $only = $request->only('name','sex');
       //获取除了某个值以外的 except()
       $except = $request->except(['age']);
       //设置默认值 
       $class = $request->input('class','php48');
       //监测参数是否存在has('数据名')  在的话返回true
       $res = $request->has('name');  //true
       
       //laravel框架提供打印 dd() 后面代码不执行
       $arr = [1,2,3,4,5,6,7,8,9];
       dd($arr);
       echo '66666'; //后面代码不继续执行
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //引入页面 
        return view('Admin.Brand.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //闪存的使用 
    public function store(Request $request){
        
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');

        //将所有值放进闪存 flash();
        // $request->flash();  //这时候还没有将数据放回input的value里面
        //使用{{old('字段名')}} 来将数据放回value
        
        //判断传过来是否有值
        if($name==null || $phone == null || $email==null){

            //阻止表单提交 back()
            // return back();

            //闪存简便方法 阻止页面提交同时将数据放进闪存
            return back()->withinput();
        }
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
