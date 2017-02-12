<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // 关于我们
    public function getAbout()
    {
        return view('pages.about');
    }
}
