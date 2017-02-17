@extends('layouts.default')

@section('title', '关于我们')

@section('body')
    <div class="row">
        {{--面包屑导航--}}
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">首页</a></li>
                <li class="active">关于我们</li>
            </ul>
        </div>
        <div class="col-md-3">
            {{--导入菜单--}}
            @include('pages.partials._siteTool')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading panel-white">
                    <h3 class="panel-title">
                        关于我们
                    </h3>
                </div>
                <div class="panel-body site-content">
                    <p class="text-indent">
                        后街胡同属于深圳泰达智信科技有限责任公司旗下品牌。后街胡同——粤东地区最为活跃的大学生生活资讯社交平台。关注我们，校园资讯、新鲜趣闻、二手买卖、求职咨询、家教兼职、交友表白等应有尽有！更有名师在线供您留言咨询哟！欢迎体验推广。用户可以通过问答等形式，建立良好的连接和交流，提升个人的价值。平台同时提供学校十大热门话题排名，让学生们宅在宿舍，便能及时知道学校中发生的趣事，提升大学生活质量！
                    </p>
                    <ul>
                        <li>
                            <strong>公司名称：</strong>深圳泰达智信科技有限责任公司
                        </li>
                        <li>
                            <strong>公司地址：</strong>深圳市福田区华强北街道赛格科技园4栋西9楼A座A19
                        </li>
                        <li>
                            <strong>网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</strong>http://www.hj-ht.com
                        </li>
                        <li>
                            <strong>广告投放：</strong>261864844@qq.com
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection