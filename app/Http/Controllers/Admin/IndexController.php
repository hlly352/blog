<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * 后台首页
     * 
     * @return [type] [description]
     */
    public function index()
    {
    	return view('admin.index',['title'=>'后台首页']);
    }
    
}
