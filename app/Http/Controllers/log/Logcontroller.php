<?php

namespace App\Http\Controllers\log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Logcontroller extends Controller
{
    public function index()
    {
        return view('log/index');
    }
    public function log_do(Request $request)
    {
        $post = request()->except('_token');
        // dd($post);
        $res = DB::table('logon')->where(['tel'=>$post['tel']])->first();
        if(!$res){
            echo '<script> alert("手机号码或者邮箱号不存在");history.go(-1);</script>';die;
        }
        if($post['pwd']!=$post['pwd']){
            echo '<script> alert("密码不一致");history.go(-1);</script>';die;
        }
       
        return redirect('/');
    }
}
