<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('新闻标题');
            $table->integer('category_id')->unsigned()->comment('分类id');
            $table->string('author')->comment('作者');
            $table->text('content')->comment('新闻内容');
            $table->integer('view_count')->default(0)->comment('浏览次数');
            $table->integer('reply_count')->default(0)->comment('回复次数');
            $table->boolean('is_block')->default(false)->comment('是否锁定');
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
