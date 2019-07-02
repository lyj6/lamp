<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>表单</title>
</head>
<body>
   <button>laravel ajax post请求</button>
</body> 
    <script src="./static/jquery-1.8.3.min.js"></script>
    <script>
    //laravel框架post请求ajax的时候 有自己独特的CSRF保护
    //通过jQuery类库 将meta标签里的token字段写入到请求标头
        $.ajaxSetup({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $('button').click(function(){
            //ajax请求数据
            $.post('doajaxpost',{},function(res){
                alert(res)
            })
        })
    </script>
</html>