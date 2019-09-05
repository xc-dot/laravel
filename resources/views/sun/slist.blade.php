<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>列表展示</h2>
    <form action="">
        姓名：<input type="text" name='name' value="{{$name}}" placeholder='请输入姓名关键字'>
        <button>搜索</button>
    </form>
    <table border='1'>
        <tr>
            <td>ID</td>
            <td>名称</td>
            <td>性别</td>
            <td>图片</td>
            <td>操作</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->sid}}</td>
            <td>{{$v->name}}</td>
            <td>
                @if($v->sex==0)
                    男
                @else
                    女
                @endif
            </td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" height="100"></td>
            <td>
                <!-- <a href="">删除</a> -->
            </td>
        </tr>
        @endforeach
    </table>
    <p>{{$data->appends($query)->links()}}</p>
</body>
</html>