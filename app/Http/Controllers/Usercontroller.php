<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\storeStdentPost;
use DB;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use App\Student;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;
class Usercontroller extends Controller
{
    public function index(){
        echo '王梓晨';
    }

    public function add(){

        Redis::set('name','123');
        echo Redis::get('name');
        die;
       // $user = ['uid'=>1,'name'=>'王梓晨是250'];
        //存session
            // session(['user'=>$user]);
            //request()->session()->put('user',$user);
            // request()->session()->save();
        //取session
            //$user = session('user');
            // $user = request()->session()->get('user');
        //删除session
            // session(['user'=>null]);
            // $user = session('user');
            // dd($user); 

        //存cookie
        // Cookie::queue(Cookie::make('aaa', 'uuu', 24*60));
        //  Cookie::queue('name', 'xxxx', 24*60);
        //  $name = Cookie::get('name');
        //  dd($name); 
        // $name = request()->cookie('name');
       
        // $mem = New \Memcache;
        // $mem->connect('127.0.0.1','11211');
      
  
        //缓存中取值
        $data = $mem->get('Usercontroller_add_student');
        // $mem->set('key','asd',0,30);
            // $mem->increment('key');
            // $mem->decrement('key');
            // echo $mem->get('key');
        if (empty($data)){
            //使用可以缓存1小时
            $data = json_encode(DB::table('student')->get());
            //设置缓存
            $mem->set('Usercontroller_add_student',$data,0,10);
        }
        // echo $mem ->get('key');return;
        print_r($data);
        return view('add');
    }
    //第二种验证
    //public function add_do(storeStdentPost $request){
        public function add_do(Request $request){
          
        //接收所有的值
        // $post = request()->post();
        // $post = request()->input();
        // $post = request()->all();
        // $post = $request->post();
        // $name = $request->sname;

        //validate验证,第一次验证
        // $request->validate([
        //     'sname' => 'required|unique:student|max:255',
        //     'age' => 'required|numeric',
        // ],[
        //     'sname.required'=>'名称必须填',
        //     'age.required'=>'年龄必须填',
        // ]);
        //除_token字段都接收
        $post = request()->except('_token');
        //第三次验证
        $validator = Validator::make($post, [
                'sname' => 'required|unique:student|max:255',
                'age' => 'required|numeric',
        ],[
            'sname.required'=>'名称必须填',
            'age.required'=>'年龄必须填',
        ]);
                if ($validator->fails()) {
                return redirect('student/add')
                        ->withErrors($validator)
                        ->withInput();
            }
   
            if( $request->hasFile('headimg') ){
                $post['headimg'] = upload('headimg');
                // dd($headimg);
            }
      
        // dd($post);
        // $res = DB::table('student')->insert($post);
        //模型
        $res = Student::create($post);
        // dd($res);
        if($res){
            return redirect('student/lists');
        }
    }
    public function lists(){
        $query = request()->input();
        //姓名搜索
        $sname = $query['sname']??'';
        $where = [];
        if($sname){
            $where[] = ['sname','like',$sname.'%'];
        }
        //年龄搜索
        $age = $query['age']??'';
        if($age){
            $where[] = ['age','=',$age];
        }
        $pageSize = config('app.pageSize');
        //$data = DB::table('student')->where($where)->paginate($pageSize);
        
        $data = Student::getStudent($where,$pageSize); 
      
       // dd($data);
        return view('lists',compact('data','query','sname','age'));
    }

 
    // 修改展示页面
    public function edit($id)
    {
         $data = DB::table('student')->where(['s_id'=>$id])->first();
        //  dd($data);
        return view('edit',['data'=>$data]);
    }

    //修改执行页面
    public function update($id)
    {
        // echo $id;
        $post = request()->except('_token');
       // dd($post);
        $validator = Validator::make($post, [
            'sname'=>
                'required',
                 Rule::unique('student')->ignore($id,'s_id'),
                 'max:30',
           
            // 'sname' => 'required|unique:student|max:255',
            'age' => 'required|numeric',
         ],[
            'sname.required'=>'名称必须填',
            'age.required'=>'年龄必须填',
        ]);
            if ($validator->fails()) {
            return redirect('student/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        }

        if( request()->hasFile('headimg') ){
            $post['headimg'] = $this->upload('headimg');
            // dd($headimg);
        }
        //图片上传
        if( request()->hasFile('headimg')){
            $post['headimg'] = upload('headimg');
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
        DB::table('student')->where('s_id',$id)->update($post);
        // dd($res);
        
            return redirect('student/lists');
    }

    //删除
    public function delete($id)
    {
        $res = Student::where('s_id',$id)->delete();
        // $res = DB::table('student')->delete();
        if($res){
            return redirect('student/lists');
        }
    }
    //唯一性
    public function checkName()
    {
        $sname = request()->name;
        //  echo $sname;
        $sid = request()->sid??'';
        if($sname){
            $where[] = ['sid','!=',$sid];
        }
        if(!$sid){
            $where['sid'] = $sid;
        }
        $count = DB::table('student')->where(['sname'=>$sname])->count();
        echo $count;
    }
}
