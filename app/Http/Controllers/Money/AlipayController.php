<?php

namespace App\Http\Controllers\Money;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 支付宝支付控制器
class AlipayController extends Controller
{
    public function index()
    {
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo('2013119101');
        $alipay->setTotalFee(1);
        $alipay->setSubject('测试商品');
        $alipay->setBody('1元测试商品');
        return redirect()->to($alipay->getPayLink());
    }
}
