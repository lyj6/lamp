@extends('Admin/Extends/public')

@section('title','用户列表')

@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> Data Table with Numbered Pagination</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
      <label>用户列表</label>
     </div>
     <form action="/user" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: <input type="text" value="{{$request['seach'] or ''}}" name="seach" aria-controls="DataTables_Table_1" /></label>
      <input type="submit" value="搜索" class="btn btn-success"/>
     </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 185px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">Name</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 234px;">Email</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 160px;">Status</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">Phone</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 120px;">Handle</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($userlist as $value)
       <tr class="odd"> 
        <td class="sorting_1">{{$value['id']}}</td> 
        <td class="">{{$value['username']}}</td> 
        <td class="">{{$value['email']}}</td> 
        <td class="">{{$value['status']}}</td> 
        <td class="">{{$value['phone']}}</td> 
        <td class="">
        <form action="/user/{{$value['id']}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-danger" type="submit" value="删除"/>
        </form><a href="/user/{{$value['id']}}/edit" class="btn btn-success">修改</a>
        <a href="/user/{{$value['id']}}" class="btn btn-info">详情</a>
        <a href="/useraddress/{{$value['id']}}" class="btn btn-warning">收获地址</a>
        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$userlist->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script src="/js/jquery-1.7.2.min.js"></script>
 <script>
    //点击进入删除
    $('button').click(function(){
        // //得到你要删除的id
        // id  = $(this).parents('tr').find('td:first').html();
        // $.get('./get.php',{'id':id},function(res){
        //       alert(res)
        // })
        //删除父元素
        $(this).parents('tr').empty();
    })
 </script>
</html>
@endsection

