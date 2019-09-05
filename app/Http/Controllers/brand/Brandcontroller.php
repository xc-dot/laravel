<?php

namespace App\Http\Controllers\brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use DB;
class Brandcontroller extends Controller
{
    public function badd()
    {
        return view('brand/badd');
    }
    public function badd_do(Request $request)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'bname' => 'required|unique:brand|max:255',
            'burl' => 'required|url',
      ],[
            'bname.required'=>'分类名称必须填',
            'burl.required'=>'*请输入网址',
            'burl.url'=>'网址开头必须为http://'
          ]);
        if ($validator->fails()) {
        return redirect('brand/badd')
                ->withErrors($validator)
                ->withInput();
     }
     //文件上传
        if( $request->hasFile('blogo') ){
            $post['blogo'] = upload('blogo');
            // dd($headimg);
        }
     $res = DB::table('brand')->insert($post);
     if($res){
        return redirect('brand/blist');
     }

    }

    public function blist()
    {
        $query = request()->input();
        // dd($query);
        //品牌名称搜索
        $bname = $query['bname']??'';
        $where = [];
        if($bname){
            $where[] = ['bname','like',$bname.'%'];
        }
        $pageSize = config('app.pageSize');
       $data = DB::table('brand')->where($where)->paginate($pageSize);
    //    dd($data);
        return view('brand/blist',compact('data','query','bname'));
    }
    public function bdel($id)
    {
        $res = DB::table('brand')->where(['bid'=>$id])->delete();
        if($res){
            return redirect('brand/blist');
        }
    }
    public function bedit($id)
    {
        $data = DB::table('brand')->where(['bid'=>$id])->first();
        return view('brand/bedit',['data'=>$data]);
    }
    public function bupd($id)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
         'bname'=>
            'required',
            Rule::unique('brand')->ignore($id,'bid'),
            'max:30',
         'burl'=>
            'required',
            Rule::unique('brand')->ignore($id,'bid'),
            'max:30', 
            'url',    
        ],[
            'bname.required'=>'*分类名称必须填',
            'burl.required'=>'*请输入网址',
            'burl.url'=>'网址开头必须为http://',
        ]);
        if ($validator->fails()) {
            return redirect('brand/badd')
                    ->withErrors($validator)
                    ->withInput();
       }
     //文件上传
        if( request()->hasFile('blogo') ){
            $post['blogo'] = upload('blogo');
            // dd($headimg);
        }
     //图片上传
        if( request()->hasFile('blogo')){
            $post['blogo'] = upload('blogo');
            if($post['oldimg']){
                $filename = storage_path('app/public').'/'.$post['oldimg'];
            //  dd(file_exists($filename));
                if(file_exists($filename)){
                    unlink($filename);
                } 
            }          
        }
        unset($post['oldimg']);
        // dd($post);
        DB::table('brand')->where('bid',$id)->update($post);
        // dd($res);
        
            return redirect('brand/blist');
    }
}
