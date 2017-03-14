<?php
namespace App\Http\Controllers;
use App\Models\Sign;
use Illuminate\Http\Request;
use Auth;
class SignController extends Controller
{
    // 签到全部需要登录
    public function __construct()
    {
        $this->middleware('auth');
    }
    // 签到
    public function sign()
    {
        // 查找签到表中是否存在记录，如果没有则创建
//        $sign = Sign::updateOrCreate(['user_id', Auth::id()]);
//        $sign = Sign::create(['user_id' => 1]);
//        $sign = new Sign();
//        $sign->user_id = 1;
//        $sign->save();
        $id = Auth::id();
        $count = Sign::getSign($id);
        if ($count) {
            $sign = Sign::where('user_id', '=', $id)->first();
            $sign->sign_time = date('Y-m-d H:i:s');
            $sign->save();
        } else {
            $sign = new Sign();
            $sign->user_id = $id;
            $sign->sign_time = date('Y-m-d H:i:s');
            $sign->save();
        }
//        $sign = Sign::where('user_id', Auth::id())->first();
//        dd($sign);
        $data = [
            'id' => Auth::id(),
            'message' => '签到成功'
        ];
        return $data;
    }
}