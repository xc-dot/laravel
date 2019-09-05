<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Illuminate\Validation\Rule;
class Goodscontroller extends Controller
{
    public function add()
    {
        $data = DB::table('cat')->get();
        $add = DB::table('brand')->get();
        return view('goods/add',['data'=>$data,'add'=>$add]);
    }
    public function add_do(Request $request)
    {
        $post = request()->except('_token');
           //第三次验证
           $validator = Validator::make($post, [
                'name' => 'required|unique:goods|max:255',
                'money' => 'required|numeric',
                'number' => 'required|numeric',
          ],[
                'name.required'=>'商品名称必须填',
                'money.required'=>'商品价格必须填',
                'number.required'=>'商品数量必须填',
              ]);
            if ($validator->fails()) {
            return redirect('goods/add')
                    ->withErrors($validator)
                    ->withInput();
         }
         if( $request->hasFile('poto') ){
            $post['poto'] = $this->upload('poto');
            // dd($headimg);
        }
        
        $res = DB::table('goods')->insert($post);
        // dd($res);
        if($res){
            return redirect('goods/lists');
        }
        // return view('goods/add');
    }
    public function lists()
    {
        $query = request()->input();
        //姓名搜索
        $name = $query['name']??'';
        $where = [];
        if($name){
            $where[] = ['name','like',$name.'%'];
        }
        $pageSize = config('app.pageSize');
        
        $data = DB::table('goods')->where($where)->join('cat','cat.cid','=','goods.cid')->join('brand','brand.bid','=','goods.bid')->paginate($pageSize);
        // dd($data);
        $datas = DB::table('cat')->get();
        $add = DB::table('brand')->get();
        return view('goods/lists',compact('data','query','name','datas','add'));
    }

    public function upload($name){
        if ( request()->file($name)->isValid()) {
            $photo = request()->file($name);
            $store_result = $photo->store('', 'public');
            return $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }
    public function gedit($id)
    {
        $data = DB::table('goods')->where(['gid'=>$id])->first();
        //dd($data);
        return view('goods/gedit',['data'=>$data]);
    }
    public function gdel($id)
    {
        $res = DB::table('goods')->where(['gid'=>$id])->delete();
        if($res){
            return redirect('goods/lists');
        }

    }
    public function gupd($id)
    {
        $post = request()->except('_token');
        $validator = Validator::make($post, [
            'name'=>
                'required',
                 Rule::unique('goods')->ignore($id,'gid'),
                 'max:30',
            'money' => 'required|numeric',
            'number' => 'required|numeric',
      ],[
            'name.required'=>'商品名称必须填',
            'money.required'=>'商品价格必须填',
            'number.required'=>'商品数量必须填',
          ]);
        if ($validator->fails()) {
        return redirect('goods/add')
                ->withErrors($validator)
                ->withInput();
     }
     if( request()->hasFile('poto') ){
        $post['poto'] = $this->upload('poto');
    }
    //图片上传
    if( request()->hasFile('poto')){
        $post['poto'] = $this->upload('poto');
        if($post['oldimg']){
            $filename = storage_path('app/public').'/'.$post['oldimg'];
        //   dd(file_exists($filename));
            if(file_exists($filename)){
                unlink($filename);
            } 
        }          
    }
    unset($post['oldimg']);
    // dd($post);
    //  $data = DB::table('goods')->where(['gid'=>$id])->update();
     DB::table('goods')->where('gid',$id)->update($post);
     return redirect('goods/lists');
    }
}
