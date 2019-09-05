<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = 'xc321521@163.com';
        $this->send($email);
    }

    public function send($email){
        \Mail::send('mail' , ['name'=>'哈哈'] ,function($message)use($email){
        //设置主题
            $message->subject("收");
        //设置接收方
            $message->to($email);
        });
    }

}
