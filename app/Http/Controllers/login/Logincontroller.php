<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Logincontroller extends Controller
{
    public function ladd()
    {
        return view('login/ladd');
    }
    public function ladd_do(Request $request)
    {
        $post = request()->except('_token');
        $res = DB::table('login')->insert($post);
        if($res){
            return redirect('admin/index');
        }
    }
}
