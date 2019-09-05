<?php

namespace App\Http\Controllers\cargo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Gocontroller extends Controller
{
    public function goadd()
    {
        return view('cargo/goadd');
    }
    public function godo(Request $request)
    {
        $post = request()->except('_token');
        if($request->hasFile('poto')){
            $post['poto'] = upload('poto');
        }
        $res = DB::table('cargo')->insert($post);
        if($res){
            return redirect('cargo/goli');
        }
    }
    public function goli()
    {
        $data = DB::table('cargo')->get();
        return view('cargo/goli',['data'=>$data]);
    }
    public function go($id)
    {
        $data = DB::table('cargo')->where(['id'=>$id])->first();
        return view('cargo/go',['data'=>$data]);
    }
    public function gup($id)
    {
        $post = request()->except('_token');
        // $post = request()->only('num','cnum');
        // $post['cnum'] = $post['num'] - $post['cnum'];
        DB::table('cargo')->where('id',$id)->update($post);
        return redirect('cargo/goli');
    }
    // public function gup($id)
    // {
    //     $post=request()->except('_token');
    //     // dd($post);
    //     $data=DB::table('cargo')->where(['id'=>$id])->first();
    //     if ($post['num'] > $data->num) {
    //         echo json_encode(['msg'=>'出库数量超过库存数量','code'=>0]);die;
    //     }else{
    //         $session=request()->session()->get('userhuo');
    //         // dd($session->uid);
    //         $num=$data->num - $post['num'];
    //         // dd($hnum);
    //         DB::table('cargo')->where(['id'=>$id])->update(['num'=>$num]);
    //         $arr = [
    //             'uid'=>'乔星宇',
    //             // 'gid'=>$post['id'],
    //             'time'=>time(),
    //             'type'=>'出库',
    //         ];
    //         $res=DB::table('aaa')->insert($arr);
    //         if ($res) {
    //             echo json_encode(['msg'=>'出库成功','code'=>1]);
    //         }
            
    //     }
    // }

}
