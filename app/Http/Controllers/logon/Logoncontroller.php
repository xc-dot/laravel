<?php

namespace App\Http\Controllers\logon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use DB;

class Logoncontroller extends Controller
{
   
    // 接收邮箱号
    public function mail()
    {
        $mail = request()->tel;
        //   dd($mail);
        $this->send($mail);
    }
    // 发送验证码
    public function send($mail){
        $rand = rand(100000,999999);
        \Mail::raw('您的验证码是'.$rand,function($message)use($mail){
            //设置主题
            $message->subject('欢迎注册哈哈有限公司');
            //设置接收方
            $message->to($mail);
        });
     session(['mail'=>$rand]);
    }
    //注册
    public function ladd()
    {
        return view('logon/ladd');
    }
    //注册执行页面
    public function ladd_do()
    {
        $data = request()->except('_token');
        // dd($post);
        //判断验证码是否正确
        if($data['code']!=session('mail')){
            echo '<script> alert("验证码不正确");history.go(-1);</script>';die;
        }
        if(!$data['pwd']){
            echo '<script> alert("密码不能为空");history.go(-1);</script>';die;
        }
        //判断密码和确认密码的是否一致
        if($data['password']!=$data['pwd']){
            echo '<script> alert("密码不一致");history.go(-1);</script>';die;
        }
        unset($data['code']);
        unset($data['password']);
        $res = DB::table('logon')->insert($data);
        if($res){
            return redirect('log');
        }
        
    }
}
