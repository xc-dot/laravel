<?php

namespace App\Http\Controllers\ures;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Urescontroller extends Controller
{
    public function index()
    {
        return view('ures/index');
    }
    public function udo(Request $request)
    {
        $post = request()->except('_token');
        $res = DB::table('ures')->insert($post);
        if($res){
            return redirect('ures/uli');
        } 
    }
    public function uli()
    {
        $data = DB::table('ures')->get();
        return view('ures/uli',['data'=>$data]);
    }
    public function uedit($id)
    {
        $info = DB::table('ures')->where(['uid'=>$id])->first();
        return view('ures/uedit',['info'=>$info]);
    }
    public function uupd($id)
    {
        $post = request()->except('_token');
        DB::table('ures')->where('uid',$id)->update($post);
        return redirect('ures/uli');
    }
}
