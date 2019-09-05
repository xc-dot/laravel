<?php

namespace App\Http\Controllers\prolist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Procontroller extends Controller
{
    public function padd()
    {
        $data = DB::table('goods')->get();
        return view('prolist/padd',['data'=>$data]);
    }
    public function proinfo()
    {
        $add = DB::table('goods')->get();
        return view('prolist/proinfo',['add'=>$add]);
    }
}
