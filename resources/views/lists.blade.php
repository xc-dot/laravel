<form action="" method="">
    姓名：<input type="text" name='sname' value="{{$sname}}" placeholder='请输入姓名关键字'>
    年龄：<input type="text" name='age' value="{{$age}}" placeholder='请输入年龄的关键字'>
    <button>搜索</button>
</form>
<link rel="stylesheet" href="/css/bootstrap.min.css">

<table border='2'>

    <tr>
        <td>ID</td>
        <td>姓名：</td>
        <td>年龄：</td>
        <td>性别：</td>
        <td>图片：</td>
        <td>操作</td>
    </tr>
    @foreach ($data as $v)
    <tr>
        <td>{{$v->s_id}}</td>
        <td>{{$v->sname}}</td>
        <td> {{$v->age}}</td>
        <td>@if($v->sex==0)男@else女@endif</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v->headimg}}" height='100'></td>
        <td>
            <a href="{{url('student/cedit/'.$v->s_id)}}">编辑</a>|
            <a href="{{url('student/delete/'.$v->s_id)}}">删除</a>
        </td>
    </tr>
    @endforeach
</table>
<p>{{$data->appends($query)->links()}}</p>
