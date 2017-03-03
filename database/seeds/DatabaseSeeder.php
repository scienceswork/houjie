<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminMenuTableSeeder::class); // 后台菜单表
        $this->call(AdminPermissionsTableSeeder::class); // 后台权限表
    }
}
