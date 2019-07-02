<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //操作方法 $request 请求报文
    public function handle($request, Closure $next){
        //检测当前是否具有登录的session
        if($request->session()->has('uid')){
            //执行下一个请求
            return $next($request);
        }else{
            //页面跳转 redirect
            return redirect('dologin');
        }
        
    }
}
