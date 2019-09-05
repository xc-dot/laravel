@extends('layouts.shop')
@section('content')
<header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="../images/xx.jpg" />
     </div><!--head-top/-->
     <form action="{{url('logon/ladd_do')}}" method="POST" class="reg-login">
     @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/log')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入手机号码或者邮箱号" name="tel"/></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="code"/> <button id="email">获取验证码</button></div>
       <div class="lrList"><input type="password" placeholder="设置新密码（6-18位数字或字母）" name="pwd"/></div>
       <div class="lrList"><input type="password" placeholder="再次输入密码" name="password"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
    
     <script src="/js/jq.js"></script>
     <script>
            $('#email').on('click',function(){
                  event.preventDefault();
                  var email = $('[name="tel"]').val();
                  if(!email){
                        alert('请输入正确的邮箱或者手机号');
                        return false;
                  }
                  $.ajax({
                        url:"{{url('logon/mail')}}",
                        data:{tel:email},
                        success:function(msg){
                              // alert(msg);
                        }
                  })
            })
     </script>
    @endsection 