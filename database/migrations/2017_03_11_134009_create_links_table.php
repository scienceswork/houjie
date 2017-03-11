<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     * 友情链接表
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('友情链接名字');
            $table->string('link')->comment('友情链接URL');
            $table->boolean('is_closed')->default(false)->comment('是否关闭，默认为否');
            $table->integer('order')->default(0)->comment('排序，越小越前，默认为0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 删除友情链接表
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
