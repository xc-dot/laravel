<?php

namespace App\Http\Controllers\sun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Validation\Rule;
use Validator;
class Suncontroller extends Controller
{
    public function sadd()
    {
        return view('sun/sadd');
    }
    public function sadd_do(Request $request)
    {
        $post = request()->except('_token');
        // dd($post);
        //第三次验证
        $validator = Validator::make($post, [
                'name' => 'required|unique:sun|max:255',
        ],[
            'name.required'=>'名称必须填',
        ]);
                if ($validator->fails()) {
                return redirect('sun/sadd')
                        ->withErrors($validator)
                        ->withInput();
            }
            if(request()->hasFile('img')){
                $post['img'] = upload('img'); 
                // dd('img');
            }
        $data = DB::table('sun')->insert($post);
        if($data){
            return redirect('sun/slist');
        }   
    }

    public function slist()
    {
        $query = request()->input();
        $name = $query['name']??'';
        $where = [];
        if($name){
            $where[] = ['name','like',$name.'%'];
        }
        $pageSize = config('app.pageSize');
        $data = DB::table('sun')->where($where)->paginate($pageSize);
        return view('sun/slist',['data'=>$data,'query'=>$query,'name'=>$name]);
    }
}
