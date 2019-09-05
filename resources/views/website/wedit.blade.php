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
					href="#">公共管理</a>&nbsp;-</span>&nbsp;网站管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>网站添加</span>
				</div>
				<form action="{{url('website/wupd/'.$data->wid)}}" method='post' enctype="multipart/form-data">
				@csrf
				<div class="baBody">
					<div class="bbD">
						网站名称：<input type="text" class="input1" name='wname' value="{{$data->wname}}"/>
						@php echo $errors->first('wname'); @endphp
					</div>
					<div class="bbD">
						网站网址：<input type="text" class="input1" name='wurl' value="{{$data->wurl}}"/>
						@php echo $errors->first('wurl'); @endphp
					</div>
					<div class="bbD">
						链接类型：<label><input type="radio" checked="checked" value='0' name='cut'  @if($data->cut==0) checked="checked" @endif />LOGO链接</label> 
						          <label><input type="radio" value='1' name='cut' @if($data->cut==1) checked="checked" @endif />文字链接</label>
					</div>
					<div class="bbD">
					
						图片LOGO：
						<img src="{{env('UPLOAD_URL')}}{{$data->wlogo}}" height='80'>
						<div class="bbDd">
							<div class="bbDImg">+</div>
							<input type="file" class="file" name='wlogo'/> <a class="bbDDel" href="#">删除</a>
							<input type="hidden" name='oldimg' value="{{$data->wlogo}}">
						</div>
					</div>
					<div class="bbD">
						网站联系人：<input class="input1"	type="tel" name='wtel' value="{{$data->wtel}}"/>
						<!-- @php echo $errors->first('number'); @endphp -->
					</div>
					<div class="bbD">
						网站介绍：
						<textarea name="wdesc" cols="60" rows="4">{{$data->wdesc}}</textarea>
					</div>
					<div class="bbD">
						是否显示：<label>
					<input type="radio" value='0' name='is_show'  @if($data->is_show==0) checked="checked" @endif />是</label> 
			<label><input type="radio" value='1' name='is_show'  @if($data->is_show==1) checked="checked" @endif />否</label>
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