<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoolSitesTable extends Migration
{
    /**
     * Run the migrations.
     * 创建酷站数据表
     * @return void
     */
    public function up()
    {
        Schema::create('cool_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('酷站名称');
            $table->string('img_url')->comment('站点展示图URL');
            $table->string('url')->comment('站点URL');
            $table->text('description')->comment('站点描述');
            $table->integer('user_id')->comment('站点发布者id')->unsigned();
            $table->integer('sort')->comment('排序，越小越靠前，默认为0')->default(0)->unsigned()->nullable();
            $table->boolean('verified')->comment('是否验证，默认为否')->default(false)->nullable();
            $table->integer('view')->comment('浏览次数，浏览一次+1，默认为0')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 删除酷站数据表
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cool_sites');
    }
}
