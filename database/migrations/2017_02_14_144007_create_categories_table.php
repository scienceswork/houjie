<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * 创建新闻分类表
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('父级分类id');
            $table->integer('news_count')->default(0)->comment('新闻数量');
            $table->tinyInteger('weight')->default(0)->comment('分类权重');
            $table->string('name')->index()->comment('分类名称');
            $table->string('slug', 60)->unique()->comment('缩略名');
            $table->string('description')->nullable()->comment('分类描述');
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
        Schema::dropIfExists('categories');
    }
}
