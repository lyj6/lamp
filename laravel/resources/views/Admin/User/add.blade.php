@extends('Admin/Extends/public')
@section('title','添加用户')
@section('main')
<html>
 <head></head>
 <style>
    .alert ul{
        list-style:none
    }
 </style>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/user" method="post"> 
    @if (count($errors) > 0)
         <div class="mws-form-message error">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            </div>
    @endif                
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名</label> 
       <div class="mws-form-item"> 
        <input type="text" id="username" name="username" class="small" /><font id="font"></font>
        
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码</label> 
       <div class="mws-form-item"> 
        <input type="password" name="password" class="small" /> 
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
        <input type="text" class="small"  name="email"/> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话</label> 
       <div class="mws-form-item"> 
        <input type="text" name="phone" class="small" /> 
       </div> 
      </div> 
     </div> 
   </div> 
   {{csrf_field()}}
   <div class="mws-button-row"> 
    <input type="submit" value="Submit" class="btn btn-danger" /> 
    <input type="reset" value="Reset" class="btn " /> 
   </form>
   </div>  
  </div>   
 </body>
</html>
@endsection