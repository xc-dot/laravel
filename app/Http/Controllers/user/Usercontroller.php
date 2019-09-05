<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Usercontroller extends Controller
{
    public function uadd()
    {
        return view('user/uadd');
    }
    public function add_do(Request $request)
    {
        $request->validate([
            'uname' => 'required|unique:user|max:255',
            'upwd' => 'required|numeric',
        ],[
            'uname.required'=>'用户名称必须填',
            'upwd.required'=>'用户密码必须填',
        ]);
        $post = request()->except('_token');
        $res = DB::table('user')->insert($post);
        if($res){
            return redirect('user/lists');
        }
    }
    public function lists()
    {
        $data = DB::table('user')->get();
        return view('user/lists',['data'=>$data]);
    }
}
