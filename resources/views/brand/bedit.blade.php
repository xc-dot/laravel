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
					href="#">公共管理</a>&nbsp;-</span>&nbsp;品牌管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>品牌添加</span>
				</div>
				<form action="{{url('brand/bupd/'.$data->bid)}}" method='post' enctype="multipart/form-data">
				@csrf
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" class="input1" name='bname' value="{{$data->bname}}"/>
						@php echo $errors->first('bname'); @endphp
					</div>
					<div class="bbD">
						品牌网址：<input type="text" class="input1" name='burl' value="{{$data->burl}}"/>
						@php echo $errors->first('burl'); @endphp
					</div>
					<div class="bbD">
						品牌logo：
						<img src="{{env('UPLOAD_URL')}}{{$data->blogo}}" height='100'>
						<div class="bbDd">						
							<div class="bbDImg">+</div>
							<input type="file" class="file" name='blogo'/> <a class="bbDDel" href="#">删除</a>
							<input type="hidden" name='oldimg' value="{{$data->blogo}}">
						</div>
					</div>
					<div class="bbD">
						品牌描述：
						<textarea name="bdesc" cols="60" rows="4">{{$data->bdesc}}"</textarea>
					</div>
					<div class="bbD">
						品牌排序：<input class="input2"	type="text" name='border' value="{{$data->border}}"/>
						<!-- @php echo $errors->first('number'); @endphp -->
					</div>
					<div class="bbD">
						是否上架：<label><input type="radio" value='0' name='is_show' @if($data->is_show==0) checked="checked" @endif/>是</label> 
						          <label><input type="radio" value='1' name='is_show' @if($data->is_show==1) checked="checked" @endif/>否</label>
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