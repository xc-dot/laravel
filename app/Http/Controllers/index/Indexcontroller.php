<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Indexcontroller extends Controller
{
    public function index()
    {
        $data = DB::table('goods')->get();
        // $res = DB::table('cat')->where('parent_id',0)->first();
        return view('index.index',['data'=>$data]);
    }

}
