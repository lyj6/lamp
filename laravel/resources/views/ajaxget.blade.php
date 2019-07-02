<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>表单</title>
</head>
<body>
   <button>laravel ajax get请求</button>
</body> 
    <script src="./static/jquery-1.8.3.min.js"></script>
    <script>
        $('button').click(function(){
            //ajax请求数据
            $.get('doajaxget',function(res){
                alert(res);
            })
        })
    </script>
</html>