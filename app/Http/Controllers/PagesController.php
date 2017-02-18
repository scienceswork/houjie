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

    // 联系我们
    public function getContact()
    {
        return view('pages.contact');
    }

    // 用户帮助
    public function getHelp()
    {
        return view('pages.help');
    }

    // 用户协议
    public function getProtocol()
    {
        return view('pages.protocol');
    }

    // 友情链接
    public function getLinks()
    {
        return view('pages.links');
    }

    // 用户隐私权
    public function getPrivacy()
    {
        return view('pages.privacy');
    }
}
