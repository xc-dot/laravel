<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>红包管理-分享</title>
<link rel="stylesheet" type="text/css" href="../laravel/css/css.css" />
<script type="text/javascript" src="../laravel/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="../laravel/js/page.js" ></script> -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">品牌管理</a>&nbsp;-</span>
			</div>
		</div>

		<div class="page">
			<!-- balance页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form>
						<div class="cfD">
							<!-- 时间段：
							<input class="vinput" type="text" />
							&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
							<input class="vinput vpr" type="text" /> -->
							<input class="addUser" type="text" name="bname" value="{{$bname}}" placeholder="请输入品牌名称" />
							<button class="button">搜索</button>
						</div>
					</form>
				</div>
				<!-- bbalance 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="305px" class="tdColor">品牌名称</td>
							<td width="275px" class="tdColor">品牌网址</td>
							<td width="275px" class="tdColor">品牌logo</td>
							<td width="315px" class="tdColor">品牌描述</td>
							<td width="315px" class="tdColor">排序</td>
							<td width="240px" class="tdColor">是否上架</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr height="85px">
							<td>{{$v->bid}}</td>
							<td>{{$v->bname}}</td>
							<td>{{$v->burl}}</td>
							<td><img src="{{env('UPLOAD_URL')}}{{$v->blogo}}" height='100'></td>
							<td>{{$v->bdesc}}</td>	
							<td>{{$v->border}}</td>						
							<td>
								@if($v->is_show==0)
									是
								@else
									否
								@endif
							</td>
							<td>

								<a href="{{url('brand/bedit/'.$v->bid)}}">
									<img class="operation" src="../laravel/img/update.png">
								</a>

								<a href="{{url('brand/bdel/'.$v->bid)}}">
									<img class="operation delban"src="../laravel/img/delete.png">
								</a>	
							 </td>
						</tr>
						@endforeach
					</table>
					<div class="paging"><p>{{$data->appends($query)->links()}}</p></div>
				</div>
				<!-- balance 表格 显示 end-->
			</div>
			<!-- balance页面样式end -->
		</div>

	</div>
	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="../laravel/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->

</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>