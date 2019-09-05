<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="../../laravel/css/css.css" />
<script type="text/javascript" src="../../laravel/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../../laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;货物管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>货物添加</span>
				</div>
				<form action="{{url('cargo/gup/'.$data->id)}}" method='post' enctype="multipart/form-data">
				@csrf
				<div class="baBody">
					<div class="bbD">
					   货物名称：<input type="text" class="input1" name='name' value="{{$data->name}}"/>
					</div>

					<div class="bbD">
							出库的数量：<input class="input2"	type="text" name='num' />
					</div>
						<input type="hidden" name='time' value="{{time()}}">
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="go" href="#">出库</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</form>
			</div>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>
<script src="/js/jq.js"></script>
<script type="text/javascript">
    $('.huout').click(function() {
        var name = $('[name="name"]').val();
        var num  = $('[name="num"]').val();
        var _token= $('[name="_token"]').val();
        var id = {{$data->id}};
        $.post(
            "/GO/gup",
            {name:name,id:id,num:num,_token:_token},
            function(res){
                alert(res.msg);
                if (res.code==1) {
                    location.href="/cargo/goli";
                };
            },
            'json'
        );
    });
</script>