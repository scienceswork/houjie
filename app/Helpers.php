<?php
// 根据路由判断是否激活
function navViewActive($anchor)
{
    return Route::currentRouteName() == $anchor ? 'active' : '123';
}

/**
 * 得到七牛cdn上100x100头像
 * @param $avatar 头像路径
 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
 */
function avatar_min($avatar)
{
    $avatar = $avatar ? $avatar : 'avatar/default.jpeg';
    return url(env('QINIU_WEB') . $avatar . '?imageView2/1/w/100/h/100/interlace/0/q/100');
}

/**
 * 后台查看详细信息链接生成
 * @param $resource
 * @param $key
 * @return string
 */
function viewRow($resource, $key)
{
    return "<a href='/$resource/$key'><i class='fa fa-eye'></i></a>";
}

function getCategory()
{
    $all = \App\Models\Category::all()->toArray();
    $categories = [];
    // 循环组装
    foreach ($all as $category) {
        $categories[$category['id']] = $category['title'];
    }
    return $categories;
}

function getTree($data, $parent_id = 0, $count = 1)
{
    // 定义静态变量，使用递归实现取出树结构
    static $treeList = [0 => '顶级分类'];
    // 添加顶级分类
    foreach ($data as $key => $value) {
        if ($value['parent_id'] == $parent_id) {
            $treeList[$value['id']] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $count) . $value['name'];
            unset($data[$key]);
            getTree($data, $value['id'], $count+1);
        }
    }
    return $treeList;
}
