<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>添加竞猜球队</h2>
    <form action="{{route('comd')}}" method='post'>
    @csrf
        <table>
                <input type="text" name='name' size="3"> &nbsp;&nbsp;VS&nbsp;&nbsp;  <input type="text" name='came' size='4'><br>
            
                结束竞猜时间<input type="text" name='time'><br>
                <input type="submit" value="添加">
        </table>
    </form>
</body>
</html>