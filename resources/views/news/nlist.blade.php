<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>展示</h2>
    <table border=1>
        <tr>
            <td>ID</td>
            <td>标题</td>
            <td>点赞数</td>
            <td>点赞</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>
	        	<a href="{{url('news/show/'.$v['id'])}}">{{$v['title']}}</a>
	        </td>
            <td align="center" class="{{ $v['id'] }}" >
	        	{{$v['num']}}
	        </td>
	        <td>
	        	<a href="javascript:void(0) " class="dian" data-id="{{ $v['id'] }}">{{ $v['help'] }}</a>
	        </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<script src="/js/jq.js"></script>
<script>
    $('.dian').on('click',function(){
        alert('123');
        // obj = $(this);
    })
</script>