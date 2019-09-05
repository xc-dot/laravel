<?php

namespace App\Http\Controllers\comp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Comcontroller extends Controller
{
    public function coma()
    {
        return view('comp/coma');
    }
    public function comd(Request $request)
    {
        $post = request()->except('_token');
        $res = DB::table('comp')->insert($post);
        if($res){
            return redirect('comp/comli');
        } 
    }
    public function comli()
    {
        $data = DB::table('comp')->get();
        return view('comp/comli',['data'=>$data]);
    }
    public function comc($id)
    {
        $add = DB::table('comp')->where('cid',$id)->get();
        return view('comp/comc',['add'=>$add]);
    }
}
