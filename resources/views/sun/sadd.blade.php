<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>sun表添加</h2>
    <form action="{{route('sadd_do')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table border=1>
        <tr>
           <td>名称：</td>
           <td>
                <input type="text" name='name'>
                @php echo $errors->first('name'); @endphp
            </td>
        </tr>
        <tr>
            <td>性别：</td>
            <td>
                <input type="radio" name='sex' value='0'>男
                <input type="radio" name='sex' value='1'>女
            </td>
        </tr>
        <tr>
           <td>图片：</td>
           <td><input type="file" name='img'></td>
        </tr>
        <tr>
           <td><input type="submit" value='提交'></td>
           <td></td>
        </tr>
    </table>
    </form>
</body>
</html>