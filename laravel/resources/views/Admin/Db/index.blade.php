<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title></title>
        <style>
             li{float:right;
                margin-right:3px;
                border:1px solid gray;
                background:orange;
                list-style:none;
             }

        </style>
    </head>
    <body>
        <table border="1" width="600px">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Age</th>
            </tr>
            @foreach($arr as $value)
            <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['name']}}</td>
                <td>{{$value['sex']}}</td>
                <td>{{$value['age']}}</td>
            </tr>
            @endforeach
            <tr>
                <td id="li" colspan="4">{{$arr->render()}}</td>
            </tr>
        </table>
    </body>
</html>
