<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Illuminate\Validation\Rule;
class Webcontroller extends Controller
{
    //添加页面
    public function wadd()
    {
        return view('website/wadd');
    }
    //添加执行页面
    public function wadd_do(Request $request)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'wname' => 'required|unique:website|max:255',
            'wurl' => 'required|url',
        ],[
            'wname.required'=>'*请输入网站名称',
            'wurl.required'=>'*请输入网站网址',
            'wurl.url'=>'网址开头必须为http://'
          ]);
          if ($validator->fails()) {
            return redirect('website/wadd')
                    ->withErrors($validator)
                    ->withInput();
         }
        //文件上传
        if($request->hasFile('wlogo')){
            $post['wlogo'] = upload('wlogo'); 
        }
        $res = DB::table('website')->insert($post);
        if($res)
        {
            return redirect('website/wlist');
        }
    }
    //列表页面
    public function wlist()
    {
        $query = request()->input();
        $wname = $query['wname']??'';
        $where = [];
        if($wname){
            $where[] = ['wname','like',$wname.'%'];
        }
        $pageSize = config('app.pageSize');
        $data = DB::table('website')->where($where)->paginate($pageSize);
        return view('website/wlist',['data'=>$data,'query'=>$query,'wname'=>$wname]);
    }

   public function del($id)
   {
       $res = DB::table('website')->where(['wid'=>$id])->delete();
       if($res)
        {
            return redirect('website/wlist');
        }
   }
   // 修改展示页面
   public function wedit($id)
   {
        $data = DB::table('website')->where(['wid'=>$id])->first();
       //  dd($data);
       return view('website/wedit',['data'=>$data]);
   }
   public function wupd($id)
   {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'wname'=>
                'required',
                 Rule::unique('website')->ignore($id,'wid'),
                 'max:30',
            'wurl'=>
                'required',
                 Rule::unique('website')->ignore($id,'wid'),
                 'max:30', 
                 'url',    
        ],[
            'wname.required'=>'*请输入网站名称',
            'wurl.required'=>'*请输入网站网址',
            'wurl.url'=>'网址开头必须为http://',
        ]);
        if ($validator->fails()) {
            return redirect('website/wadd')
                    ->withErrors($validator)
                    ->withInput();
        }
        //文件上传
        if(request()->hasFile('wlogo')){
            $post['wlogo'] = upload('wlogo'); 
        }
        //图片上传
        if( request()->hasFile('wlogo')){
            $post['wlogo'] = upload('wlogo');
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
        DB::table('website')->where('wid',$id)->update($post);
        // dd($res);
        
            return redirect('website/wlist');
   }
}
