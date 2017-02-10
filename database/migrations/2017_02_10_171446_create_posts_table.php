<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * 创建博客表
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('博客标题');
            $table->text('description')->comment('博客描述');
            $table->text('body')->comment('博客内容');
            $table->boolean('is_blocked')->comment('是否锁定')->default(false);
            $table->integer('user_id')->comment('博客所有者id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * 删除博客表
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
