<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => '后台首页',
                'icon' => 'fa-tachometer',
                'uri' => '/',
                'created_at' => NULL,
                'updated_at' => '2017-02-09 01:12:47',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 13,
                'title' => '系统管理',
                'icon' => 'fa-tasks',
                'uri' => '',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 14,
                'title' => '管理员',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 15,
                'title' => '角色管理',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 16,
                'title' => '权限管理',
                'icon' => 'fa-user',
                'uri' => 'auth/permissions',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 17,
                'title' => '菜单管理',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 19,
                'title' => '操作日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'created_at' => NULL,
                'updated_at' => '2017-02-19 10:20:42',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 2,
                'title' => '用户管理',
                'icon' => 'fa-users',
                'uri' => '',
                'created_at' => '2017-02-08 22:25:32',
                'updated_at' => '2017-02-08 22:25:41',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 2,
                'order' => 18,
                'title' => '系统设置',
                'icon' => 'fa-cogs',
                'uri' => '',
                'created_at' => '2017-02-08 22:29:43',
                'updated_at' => '2017-02-19 10:20:42',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 8,
                'order' => 3,
                'title' => '用户列表',
                'icon' => 'fa-user',
                'uri' => 'users',
                'created_at' => '2017-02-08 22:53:07',
                'updated_at' => '2017-02-09 12:01:22',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 8,
                'order' => 4,
                'title' => '新建用户',
                'icon' => 'fa-send',
                'uri' => 'users/create',
                'created_at' => '2017-02-09 00:55:50',
                'updated_at' => '2017-02-09 12:01:22',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 5,
                'title' => '订单管理',
                'icon' => 'fa-barcode',
                'uri' => '',
                'created_at' => '2017-02-09 12:00:27',
                'updated_at' => '2017-02-09 12:01:22',
            ),
            12 => 
            array (
                'id' => 13,
                'parent_id' => 0,
                'order' => 11,
                'title' => '审核管理',
                'icon' => 'fa-briefcase',
                'uri' => '',
                'created_at' => '2017-02-09 12:01:13',
                'updated_at' => '2017-02-19 10:20:42',
            ),
            13 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 10,
                'title' => '文章管理',
                'icon' => 'fa-book',
                'uri' => '',
                'created_at' => '2017-02-09 12:02:07',
                'updated_at' => '2017-02-19 10:21:26',
            ),
            14 => 
            array (
                'id' => 15,
                'parent_id' => 13,
                'order' => 12,
                'title' => '酷站审核',
                'icon' => 'fa-tv',
                'uri' => 'cool_sites',
                'created_at' => '2017-02-13 19:24:12',
                'updated_at' => '2017-02-19 10:20:42',
            ),
            15 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 7,
                'title' => '新闻管理',
                'icon' => 'fa-newspaper-o',
                'uri' => '',
                'created_at' => '2017-02-14 14:57:39',
                'updated_at' => '2017-02-19 10:21:26',
            ),
            16 => 
            array (
                'id' => 17,
                'parent_id' => 16,
                'order' => 8,
                'title' => '分类管理',
                'icon' => 'fa-certificate',
                'uri' => 'category',
                'created_at' => '2017-02-14 14:58:36',
                'updated_at' => '2017-02-19 10:21:26',
            ),
            17 => 
            array (
                'id' => 18,
                'parent_id' => 16,
                'order' => 9,
                'title' => '新闻列表',
                'icon' => 'fa-th-list',
                'uri' => 'news',
                'created_at' => '2017-02-14 18:25:25',
                'updated_at' => '2017-02-19 10:21:26',
            ),
            18 => 
            array (
                'id' => 19,
                'parent_id' => 0,
                'order' => 6,
                'title' => '情书管理',
                'icon' => 'fa-codiepie',
                'uri' => '',
                'created_at' => '2017-02-19 10:20:35',
                'updated_at' => '2017-02-19 10:21:26',
            ),
            19 => 
            array (
                'id' => 20,
                'parent_id' => 19,
                'order' => 0,
                'title' => '情书列表',
                'icon' => 'fa-align-justify',
                'uri' => 'express',
                'created_at' => '2017-02-19 10:22:55',
                'updated_at' => '2017-02-19 10:31:41',
            ),
            20 => 
            array (
                'id' => 21,
                'parent_id' => 19,
                'order' => 0,
                'title' => '匿名情书',
                'icon' => 'fa-book',
                'uri' => '',
                'created_at' => '2017-02-19 10:23:49',
                'updated_at' => '2017-02-19 10:23:49',
            ),
            21 => 
            array (
                'id' => 22,
                'parent_id' => 19,
                'order' => 0,
                'title' => '封禁情书',
                'icon' => 'fa-eye-slash',
                'uri' => '',
                'created_at' => '2017-02-19 10:24:49',
                'updated_at' => '2017-02-19 10:24:49',
            ),
            22 => 
            array (
                'id' => 23,
                'parent_id' => 13,
                'order' => 0,
                'title' => '教师审核',
                'icon' => 'fa-child',
                'uri' => 'teacher',
                'created_at' => '2017-03-02 23:23:32',
                'updated_at' => '2017-03-02 23:23:32',
            ),
        ));
        
        
    }
}