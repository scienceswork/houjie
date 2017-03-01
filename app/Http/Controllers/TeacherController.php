<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * 教师在线控制器中间件
     * TeacherController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth', )
    }

    /**
     * 教师在线首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('teacher.index');
    }

    public function create()
    {
        return view('teacher.create');
    }
}
