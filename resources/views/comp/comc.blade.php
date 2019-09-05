<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>我要竞猜</h2>

    @foreach ($add as $v)
        <b>{{$v->name}}</b> VS <b>{{$v->came}}</b>
    @endforeach
     <form action="">
     @csrf
          <input type="radio">胜&nbsp;&nbsp;<input type="radio">平&nbsp;&nbsp;<input type="radio">负
     </form>
</body>
</html>