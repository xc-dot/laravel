<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admincontroller extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
    public function head()
    {
        return view('admin/head');
    }
    public function left()
    {
        return view('admin/left');
    }
    public function main()
    {
        return view('admin/main');
    }
}
