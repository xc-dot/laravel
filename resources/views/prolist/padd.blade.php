@extends('layouts.shop')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
     <ul class="pro-select">
      <li class="pro-selCur"><a href="javascript:;">新品</a></li>
      <li><a href="javascript:;">销量</a></li>
      <li><a href="javascript:;">价格</a></li>
     </ul><!--pro-select/-->
     <div class="prolist">
     @foreach ($data as $v)
      <dl>
       <dt><a href="{{url('prolist/proinfo'.$v->gid)}}"><img src="{{env('UPLOAD_URL')}}{{$v->poto}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="proinfo.html">{{$v->name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->money}}</strong> <span>¥200</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>已售：{{$v->number}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      @endforeach

     </div><!--prolist/-->
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script> -->
    <!--焦点轮换-->
    <!-- <script src="js/jquery.excoloSlider.js"></script>
    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>  -->
  @yield('content')
@endsection 