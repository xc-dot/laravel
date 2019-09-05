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
					href="#">公共管理</a>&nbsp;-</span>&nbsp;商品管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>商品修改</span>
				</div>
				<form action="{{url('goods/gupd/'.$data->gid)}}" method='post' enctype="multipart/form-data">
				@csrf
				<div class="baBody">
					<div class="bbD">
						商品名称：<input type="text" class="input1" name='name' value="{{$data->name}}"/>
								@php echo $errors->first('name'); @endphp
					</div>
					<div class="bbD">
						商品价格：<input type="text" class="input1" name='money' value="{{$data->money}}"/>
								@php echo $errors->first('money'); @endphp
					</div>
					<div class="bbD">
						上传图片：
	 				<img src="{{env('UPLOAD_URL')}}{{$data->poto}}" height='100'>				
						<div class="bbDd">
							<div class="bbDImg">+</div>				
							<input type="file" class="file" name='poto'/>
							<input type="hidden" name='oldimg' value="{{$data->poto}}">								
						</div>					
					</div>
					<div class="bbD">
						商品数量：<input class="input2"	type="text" name='number' value="{{$data->number}}"/>@php echo $errors->first('number'); @endphp

					<div class="bbD">
						是否上架：<label>
									<input type="radio" value='0' name='is_sole' @if($data->is_sole==0) checked="checked" @endif/>是
								</label> 
						    	<label>
								  <input type="radio" value='1' name='is_sole' @if($data->is_sole==1) checked="checked" @endif/>否
								</label>
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
		
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>