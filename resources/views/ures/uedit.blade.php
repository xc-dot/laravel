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
					href="#">库管管理</a>&nbsp;-</span>&nbsp;库管管理
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>库管管理</span>
				</div>
				<form action="{{url('ures/uupd/'.$info->uid)}}" method='post'>
				@csrf
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;用户名：<input type="text" class="input3" name='uname' value='{{$info->uname}}' />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码：<input type="password"
							class="input3" name='pwd' value='{{$info->pwd}}'/>
					</div>
                    <div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;用户身份：
                        <input type="radio" name='is_show' value='0' @if($info->is_show==0) checked="checked" @endif/>主管
                        <input type="radio"  name='is_show' value='1'@if($info->is_show==1) checked="checked" @endif/>库管员
					</div>
					<!-- <div class="bbD">
						用户等级：<input type="password" class="input3" />
					</div> -->
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">修改</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
				</form>
			</div>

			<!-- 会员注册页面样式end -->
		</div>
	</div>
</body>
</html>