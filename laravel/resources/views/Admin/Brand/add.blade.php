<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="/brand" method="post">
        名字:<input type="text" name="name" value="{{old('name')}}"><br>
        电话:<input type="text" name="phone" value="{{old('phone')}}"><br>
        邮箱:<input type="text" name="email" value="{{old('email')}}"><br>
        {{csrf_field()}}
        <input type="submit" value="添加">
    </form>
</body>
</html>