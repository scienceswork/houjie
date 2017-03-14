<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCommuintyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_community', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('父级分类id');
            $table->integer('news_count')->default(0)->comment('文章数量');
            $table->string('title')->index()->comment('分类名称');
            $table->integer('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('category_community');
    }
}
