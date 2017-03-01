<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     * 创建教师在线表
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('在线名称，名称必须唯一');
            $table->string('slug')->unique()->comment('缩略名，表示http://xxx.com/teacher/slug');
            $table->integer('articles_count')->default(0)->comment('文章数');
            $table->integer('member_count')->default(0)->comment('关注数');
            $table->boolean('is_recommend')->default(false)->comment('是否推荐，默认为否');
            $table->integer('order')->default(0)->comment('排序，默认为0，越小越靠前');
            $table->integer('user_id')->unsigned()->comment('申请人id');
            $table->string('description')->comment('教师一句话在线描述');
            $table->string('avatar')->comment('教师在线头像');
            $table->boolean('is_close')->default(false)->comment('是否关闭，默认为否');
            $table->boolean('is_audit')->default(false)->comment('是否审核');
            $table->boolean('is_pass')->default(false)->comment('是否通过');
            $table->string('prove')->comment('证明资质文件，图片或者其他文件');
            $table->string('phone')->comment('手机号码');
            $table->string('email')->comment('电子邮件，用于接收审核结果');
            $table->text('reason')->comment('申请理由');
            $table->text('audit_message')->nullable()->comment('审核信息');
            $table->integer('audit_user')->unsigned()->nullable()->comment('审核人');
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
        Schema::dropIfExists('users');
    }
}
