<?php

namespace App\Http\Controllers\news;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Newscontroller extends Controller
{
    public function nadd()
    {
        return view('news/nadd');
    }
    public function nadd_do(Request $request)
    {
        $post = request()->except('_token');
        // dd($post);
        $res = DB::table('news')->insert($post);
        if($res)
        {
            return redirect('news/nlist');
        }   
    }
    public function nlist()
    {
        $data = DB::table('news')->get();
        return view('news/nlist',['data'=>$data]);
    }

    public function show($id)
    {
        $data = DB::table('news')->first();
        $data = json_decode(json_encode($data),true);
        $content = $data['content'];
        return view('news/show',compact('content'));
    }
}
