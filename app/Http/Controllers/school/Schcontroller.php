<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Schcontroller extends Controller
{
    public function sadd()
    {
        return view('school/sadd');
    }
    public function sadd_do(Request $request)
    {
        $post = request()->except('_token');
        $res = DB::table('school')->insert($post);
        if($res){
            return redirect('school/slis');
        }
    }
    public function slis()
    {
        $data = DB::table('school')->get();
        return view('school/slis',['data'=>$data]);
    }
    public function sdel($id)
    {
        $res = DB::table('school')->where(['id'=>$id])->delete();
        if($res){
            return redirect('school/slis');
        }
    }
    public function sedit($id)
    {   
        $data = DB::table('school')->where(['id'=>$id])->first();
        return view('school/sedit',['data'=>$data]);
    }
    public function supd($id)
    {
        $post = request()->except('_token');
         DB::table('school')->where('id',$id)->update($post);
        return redirect('school/slis');
    }
}
