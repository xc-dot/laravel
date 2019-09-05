<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>列表</h2>
    <table border='1'>
        <tr>
            <td>ID</td>
            <td>学生姓名</td>
            <td>学生年龄</td>
            <td>地址</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->age}}</td>
            <td>
                @if($v->address==1)
                    昌平
                @else
                    房山
                @endif
            </td>
            <td>
                @if($v->status==0)
                    在校
                @else
                    离校
                @endif
            </td>
            <td>
                <a href="{{url('school/sdel/'.$v->id)}}">删除</a>
                <a href="{{url('school/sedit/'.$v->id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>