@extends('layouts.shop')
@section('content')
   
<div class="head-top">
      <img src="images/b.jpg" />
      <dl>
       <dt><a href="user.html"><img src="images/c.png" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="{{route('padd')}}"><strong>34</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url('/log')}}">登录</a></li>
      <li><a href="{{route('ladd')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
      <img src="images/image1.jpg" />
      <img src="images/image2.jpg" />
      <img src="images/image3.jpg" />
      <img src="images/image4.jpg" />
      <img src="images/image5.jpg" />
     </div><!--sliderA/-->
     <ul class="pronav">
      <li><a href="prolist.html">晋恩干红</a></li>
      <li><a href="prolist.html">万能手链</a></li>
      <li><a href="prolist.html">高级手镯</a></li>
      <li><a href="prolist.html">特异戒指</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
      <!-- 商品循环 -->
      @foreach ($data as $v)
      <div class="index-pro1-list">     
       <dl>      
        <dt><a href="{{url('prolist/proinfo')}}"><img src="{{env('UPLOAD_URL')}}{{$v->poto}}" /></a></dt>
        <dd class="ip-text"><a href="{{url('prolist/proinfo')}}">{{$v->name}}</a><span>已售：{{$v->number}}</span></dd>
        <dd class="ip-price"><strong>¥{{$v->money}}</strong> <span>¥599</span></dd>   
       </dl>
      </div>
      @endforeach  
     </div><!--index-pro1/-->
     <div class="prolist">
     @foreach ($data as $v)
      <dl>
       <dt><a href="{{url('prolist/proinfo')}}"><img src="{{env('UPLOAD_URL')}}{{$v->poto}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="{{url('prolist/proinfo')}}">{{$v->name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->money}}</strong> <span>¥599</span></div>
        <div class="prolist-yishou"><a href="{{url('car/car'.$v->gid)}}"><span class='car'>加入购物车</span></a> <em>已售：{{$v->number}}5</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>

     <!-- @yield('content') -->
     <script src="/js/jq.js"></script>
 <script type="text/javascript">
      $('.car').on('click',function(){
            // alert('123');return;
        event.preventDefault();
        //加入购物车数量
        var number=$('.spinnerExample').val();
        // alert(number);
        //获取商品id
        var gid = $(this).attr('gid');
        //获取商品价格
        var money=$(this).attr('money');
        $.ajax({
          url:"{{url('car/car')}}",
          data:{number:number,gid:gid,money:money}
          success:function(msg){
              if(msg.ret=='00000'){
                //购物车添加成功跳转购物车列表
                alert(msg.msg);
                location.href="{{url('car/car')}}";
              }else{
                //没有登录跳转登录页
                alert(msg.msg);
                location.href="{{url('logon')}}";
              }
          }
      })
  })
</script>
     @include ('public/footer');
     @endsection 