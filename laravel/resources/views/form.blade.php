<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>表单</title>
</head>
<body>
    <form action="doinsert" method="post">
        名字:<input type="text" name="name"><br>
        年龄:<input type="text" name="age"><br>
        <!-- 解决csrf -->
        {{csrf_field()}}
        <input type="submit" value="添加">

    </form>
</body>
</html>