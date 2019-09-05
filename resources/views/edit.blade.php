<!-- 
@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    </ul>
    </div>
@endif -->

<form action="{{url('student/update/'.$data->s_id)}}" method='post' enctype="multipart/form-data">
@csrf
    <p>
        姓名：<input type="text" name='sname' value="{{$data->sname}}" placeholder='请输入姓名'>
                @php echo $errors->first('sname'); @endphp
    </p>
    <p>
        年龄：<input type="number" name='age' value="{{$data->age}}" placeholder='请输入年龄'>
                @php echo $errors->first('age'); @endphp
    </p>
    <p>
    性别：<input type="radio" name='sex' value='0' @if($data->sex==0) checked="checked" @endif>男 
        <input type="radio" name='sex' value='1' @if($data->sex==1) checked="checked" @endif >女
    </p>
    <p>
        <input type="file" name="headimg">
            <img src="{{env('UPLOAD_URL')}}{{$data->headimg}}" height='100'>
    </p>
    <p><input type="hidden" name='oldimg' value="{{$data->headimg}}"></p>
    <p><button>提交</button></p>
</form>
<script>
    $('input[name="sname"]').blur(function(){
        // alert('123');
        //获取name的值 
        // if(!sname){
        //     $(this).after('<b style="color:red">学生姓名不能为空</b>');
        // }
       var sname = $(this).val();
       var obj = $(this);
        // alert(sname);
        //清空
        $(this).next().remove();
        //中文 字母
        var reg = /^[\u4e00-\u9fa5A-za-z]{2,12}$/;
        if(!reg.test(sname)){
            $(this).after('<b style="color:red">学生姓名必须以中文，字母组成2-12位</b>');
            return;
        }
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var sid = {{$data->s_id}};
        //唯一性验证
        $.post('/student/checkName',{name:sname,sid:sid},function(msg){ 
            // alert(msg);
            if(msg>0){
               obj.after('<b style="color:red">学生姓名已存在</b>');
            }
        });
    });
      //年龄
      $('input[name="age"]').blur(function(){
            // alert('123');
            var age = $(this).val();
            $(this).next().remove();
            // alert(isNaN(age));
            var reg = /^\d{1,3}$/;
            if(!reg.test(age)){
                $(this).after('<b style="color:red">请输入正确年龄</b> ');
            }
        });
    
    //点击堤交按扭触发的验证
   $('input[type="button"]').click(function(){
        // alert(123);
        var sname = $('input[name="sname"]').val();
        // var obj = $('input[name="sname"]');
            // alert(sname);
            //清空
            $('input[name="sname"]').next().remove();
            //中文 字母
            var reg = /^[\u4e00-\u9fa5A-za-z]{2,12}$/;
            if(!reg.test(sname)){
                $('input[name="sname"]').after('<b style="color:red">学生姓名必须以中文，字母组成2-12位</b>');
                return;
            }
            
        //年龄
      
            // alert('123');
            var age = $('input[name="age"]').val();
            $('input[name="age"]').next().remove();
            // alert(isNaN(age));
            var reg = /^\d{1,3}$/;
            if(!reg.test(age)){
                $('input[name="age"]').after('<b style="color:red">请输入正确年龄</b> ');
                return;
            }
            $('form').submit();

    });
</script>