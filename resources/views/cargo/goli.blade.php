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
					href="#">货物管理</a>&nbsp;-</span>
			</div>
		</div>

		<div class="page">
			<!-- balance页面样式 -->
			<div class="connoisseur">
			
				
				<!-- bbalance 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="305px" class="tdColor">货物名称</td>
							<td width="275px" class="tdColor">货物图片</td>
							<td width="315px" class="tdColor">当前库存量</td>
							<td width="315px" class="tdColor">入库时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr height="85px">
							<td>{{$v->id}}</td>
							<td>{{$v->name}}</td>
							<td><img src="{{env('UPLOAD_URL')}}{{$v->poto}}" height='100'></td>
							<td>{{$v->num}}</td>
							<td>{{date('Y-m-d H:i:s',$v->time)}}</td>
							<td>
								<!-- <a href="">
									<img class="operation" src="../laravel/img/update.png">
								</a>
								<a href="">
									<img class="operation delban"src="../laravel/img/delete.png">
								</a>	 -->
								<a href="{{url('cargo/go/'.$v->id)}}">出库</a>
							 </td>
						</tr>
						@endforeach
					</table>
				
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

</html>