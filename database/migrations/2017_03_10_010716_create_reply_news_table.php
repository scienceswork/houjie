<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('评论用户id');
            $table->unsignedInteger('news_id')->comment('评论新闻id');
            $table->string('content')->comment('评论内容');
            $table->boolean('is_lock')->default(false)->comment('是否锁定，默认为否');
            $table->softDeletes(); // 软删除
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_news');
    }
}
