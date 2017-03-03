<?php

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => '创建新闻',
                'slug' => 'create_news',
                'created_at' => '2017-02-28 16:07:53',
                'updated_at' => '2017-02-28 16:07:53',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '删除新闻',
                'slug' => 'delete_news',
                'created_at' => '2017-02-28 16:08:08',
                'updated_at' => '2017-02-28 16:08:08',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '更新新闻',
                'slug' => 'update_news',
                'created_at' => '2017-02-28 16:08:20',
                'updated_at' => '2017-02-28 16:08:20',
            ),
        ));
        
        
    }
}