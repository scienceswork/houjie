<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     * 创建教师在线发帖表
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->unsignedInteger('teacher_id')->comment('教师在线id');
            $table->string('name')->comment('发帖名称');
            $table->text('content')->comment('发帖内容');
            $table->unsignedInteger('last_rep_user')->nullable()->comment('最后一个回复的用户id');
            $table->text('last_rep_content')->nullable()->comment('最后一个回贴内容');
            $table->integer('rep_count')->default(0)->comment('回帖数');
            $table->boolean('is_close')->default(false)->comment('是否关闭');
            $table->string('message')->nullable()->comment('帖子异常信息，如关闭理由');
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
        Schema::dropIfExists('topics');
    }
}
