<!-- 引入子视图 -->
@include('Admin.View.son')
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <!-- 接收控制器传来的数据 -->
    {{$name}}{{$age}}
    <!-- 函数解析 -->
    <p>函数解析:{{time()}}</p>
    <!-- 设置默认值 不存在这个值就走or -->
    <p>设置默认值:{{$sex or '默认值'}}</p>
    <!-- 显示HTML代码 -->
    <p>函数解析:{!!'<a href="">超链接</a>'!!}</p>
                     
   
    <!-- 流程控制 -->
    @if($num > 10)
       这是真区间 
    @elseif($num < 10)
       这也可以是真区间
    @else
       你们不行我来
    @endif
    
    <!--for循环 -->
    @for($i=0;$i< 10;$i++)
        {{$i}}
    @endfor 

    <!-- foreach循环 -->
    <table border="1" width="300px">
    <tr>
        <th>姓名</th>
        <th>年龄</th>
        <th>性别</th>
    </tr>
    @foreach($arr as $value)
    <tr>
        <td>{{$value['name']}}</td>
        <td>{{$value['age']}}</td>
        <td>{{$value['sex']}}</td>
    </tr>
    @endforeach
</body>
</html>