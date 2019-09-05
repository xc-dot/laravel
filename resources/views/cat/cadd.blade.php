<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户-有点</title>
<link rel="stylesheet" type="text/css" href="../laravel/css/css.css" />
<script type="text/javascript" src="../laravel/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;用户管理
			</div>
		</div>
		<div class="page ">
			<!-- 会员注册页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>分类管理</span>
				</div>
				<form action="{{route('cadd_do')}}" method='post'>
				@csrf
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;分类名称：<input type="text" class="input3" name='cname' />
						@php echo $errors->first('cname'); @endphp
					</div>
					<div class="bbD">
					&nbsp;&nbsp;&nbsp;排序：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="order" class="input3" name="sort_order"/>
					@php echo $errors->first('sort_order'); @endphp
					</div>
					<div class="bbD" height="42" width="242">					
						&nbsp;&nbsp;上级分类：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
								<select name="parent_id" >
								<option value="0">顶级分类</option>
								@foreach ($list as $v)
									<option value="{{$v->cid}}">{{str_repeat("--|",$v->level-1).$v->cname}}</option>
									@endforeach
								</select>
						
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
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