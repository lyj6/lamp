@extends('Admin/Extends/public')
@section('title','用户修改')
@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/user/{{$find['id']}}" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" value="{{$find['username']}}" name="username" class="small" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" value="{{$find['password']}}" name="password" class="small" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">确认密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name="repassword" class="small" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱</label> 
       <div class="mws-form-item"> 
        <input type="text" value="{{$find['email']}}" class="small"  name="email"/> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话</label> 
       <div class="mws-form-item"> 
        <input type="text" value="{{$find['phone']}}" name="phone" class="small" /> 
       </div> 
      </div> 
     </div> 
   </div> 
   {{csrf_field()}}
   <div class="mws-button-row"> 
   {{csrf_field()}}
   {{method_field('PUT')}}
    <input type="submit" value="修改" class="btn btn-danger" /> 
    <input type="reset" value="重置" class="btn " /> 
   </form>
   </div>  
  </div>   
 </body>
</html>
@endsection