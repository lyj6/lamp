<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <table border="1" width="500px">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Sex</th>
            <th>操作</th>
        </tr>
        <tr >
            <td>1</td>
            <td>zby</td>
            <td>女</td>
            <td><form action="/index/1" method="post">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除"/>
            </form><a href="/index/1/edit">修改</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>zcc</td>
            <td>渣</td>
            <td><form action="/index/2" method="post">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除"/>
            </form>|<a href="/index/2/edit">修改</a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>lzq</td>
            <td>半妖</td>
            <td><form action="/index/3" method="post">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="删除"/>
            </form>|<a href="/index/3/edit">修改</a></td>
        </tr>
    </table>
</body>
</html>