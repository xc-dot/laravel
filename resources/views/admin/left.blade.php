<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="../laravel/css/public.css" />
<script type="text/javascript" src="../laravel/js/jquery.min.js"></script>
<script type="text/javascript" src="../laravel/js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="../main.html" target="main"><div class="line">
					<img src="../laravel/img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="../laravel/img/coin01.png" /><img class="icon2"src="../laravel/img/coin02.png" />
				首页<img class="icon3" src="../laravel/img/coin19.png" /><img class="icon4" src="../laravel/img/coin20.png" /></dt>
		</dl> -->
		<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin05.png" /><img class="icon2"
						src="../laravel/img/coin06.png" /> 用户管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a class="cks" href="{{route('uadd')}}"
						target="main">用户管理添加</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a class="cks" href="{{route('ulists')}}"
						target="main">用户管理列表</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>

			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin03.png" /><img class="icon2"
						src="../laravel/img/coin04.png" /> 商品管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a class="cks" href="{{route('add')}}"
						target="main">商品添加</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a class="cks" href="{{route('lists')}}"
						target="main">商品列表</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>

			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin07.png" /><img class="icon2"
						src="../laravel/img/coin08.png" /> 分类管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('cadd')}}" target="main"
						class="cks">分类添加</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('clist')}}" target="main"
						class="cks">分类列表</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin10.png" /><img class="icon2"
						src="../laravel/img/coin09.png" /> 品牌管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('badd')}}"
						target="main" class="cks">品牌添加</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('blist')}}"
						target="main" class="cks">品牌列表</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin11.png" /><img class="icon2"
						src="../laravel/img/coin12.png" /> 网站管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('wadd')}}" target="main"
						class="cks">网站添加</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('wlist')}}" target="main"
						class="cks">网站列表</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin07.png" /><img class="icon2"
						src="../laravel/img/coin13.png" /> 库管管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('index')}}" target="main"
						class="cks">库管添加</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('uli')}}" target="main"
						class="cks">库管展示</a><img class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin15.png" /><img class="icon2"
						src="../laravel/img/coin16.png" /> 货物管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('goadd')}}"
						target="main" class="cks">货物添加</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="{{route('goli')}}"
						target="main" class="cks">货物列表</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coin17.png" /><img class="icon2"
						src="../laravel/img/coin18.png" /> 收支管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="../balance.html"
						target="main" class="cks">收支管理</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
			</dl>
			<dl class="system_log">
				<dt>
					<img class="icon1" src="../laravel/img/coinL1.png" /><img class="icon2"
						src="../laravel/img/coinL2.png" /> 系统管理<img class="icon3"
						src="../laravel/img/coin19.png" /><img class="icon4"
						src="../laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a href="../changepwd.html"
						target="main" class="cks">修改密码</a><img class="icon5"
						src="../laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="../laravel/img/coin111.png" /><img class="coin22"
						src="../laravel/img/coin222.png" /><a class="cks">退出</a><img
						class="icon5" src="../laravel/img/coin21.png" />
				</dd>
			</dl>

		</div>

	</div>
</body>
</html>
