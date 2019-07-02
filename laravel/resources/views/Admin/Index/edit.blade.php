<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="/index/2" method="post">
        名字:<input type="text" name="name"><br>
        性别:<input type="text" name="sex"><br>
        {{method_field('PUT')}}
        {{csrf_field()}}
        <input type="submit" value="修改">
    </form>
</body>
</html>