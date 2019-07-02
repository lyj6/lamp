<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="/file" method="post" enctype="multipart/form-data">
        头像:<input type="file" name="tp"><br>
            {{csrf_field()}}
            <input type="submit" value="添加">
    </form>
</body>
</html>