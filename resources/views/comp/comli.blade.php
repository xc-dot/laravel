<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>竞猜列表</h2>
    <table border=1>
    @foreach ($data as $v)
        <tr>
            <td>{{$v->name}}VS{{$v->came}}</td>
            <td><button><a href="{{url('comp/comc/'.$v->cid)}}">竞猜</a></button> </td>
        </tr>
    @endforeach
    </table>
</body>
</html>