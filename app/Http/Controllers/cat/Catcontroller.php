<?php

namespace App\Http\Controllers\cat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Illuminate\Validation\Rule;
class Catcontroller extends Controller
{
    //添加页面
    public function cadd()
    {
        $list = DB::table('cat')->orderBy('sort_order','desc')->get();
       // dd($list);
        $list = createTree($list);
        //dd($list);
        return view('cat\cadd',['list'=>$list]);
    }
    //添加执行页面
    public function cadd_do(Request $request)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'cname' => 'required|unique:cat|max:255',
            'sort_order' => 'required|numeric',
      ],[
            'cname.required'=>'分类名称必须填',
            'sort_order.required'=>'排序必须填',
          ]);
        if ($validator->fails()) {
        return redirect('cat/cadd')
                ->withErrors($validator)
                ->withInput();
     }
        $res = DB::table('cat')->insert($post);
        if($res){
            return redirect('cat/clist');
        }
    }
    //列表展示页面
    public function clist()
    {
       $data = DB::table('cat')->get();
       // dump($data);die;
       $data = DB::table('cat')->orderBy('sort_order','desc')->get();
       $data = createTree($data);
        return view('cat\clist',['data'=>$data]);
    }
    //删除执行页面
    public function cdel($id)
    {
       
        // $data = DB::table('cat')->where(['parent_id'=>$id])->get();
        //     if($data){
        //         $this->error('此分类下有子类，不能删除');die;
        //     }
        // $goodsData = table('goods')->where('cid',$id)->get();
        //     if($goodsData){
        //         $this->error('当前分类下有商品，不能删除');die;
        //     }
        $res = DB::table('cat')->where(['cid'=>$id])->delete();
        if($res){
            return redirect('cat/clist');
        }
    }
    //修改页面
    public function cedit($id)
    {
        $list = DB::table('cat')->orderBy('sort_order','desc')->get();
        $list = createTree($list);
        // $post = request()->execpt('_token');
        $data = DB::table('cat')->where(['cid'=>$id])->first();
        return view('cat\cedit',['data'=>$data,'list'=>$list]);
    }
    public function cupd($id)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'cname'=>
                'required',
                 Rule::unique('goods')->ignore($id,'gid'),
                 'max:30',
            'sort_order' => 'required|numeric',
      ],[
            'cname.required'=>'分类名称必须填',
            'sort_order.required'=>'排序必须填',
          ]);
        if ($validator->fails()) {
        return redirect('cat/cadd')
                ->withErrors($validator)
                ->withInput();
     }
    DB::table('cat')->where('cid',$id)->update($post);

        return redirect('cat/clist');

    }
}
