<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressionsTable extends Migration
{
    /**
     * Run the migrations.
     * 传情应用数据表
     * @return void
     */
    public function up()
    {
        Schema::create('expressions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receiver', 100)->comment('收件人');
            $table->string('sender', 100)->comment('发件人');
            $table->string('content')->comment('表白内容');
            $table->string('password')->unique()->comment('自定义专属密码，唯一索引，表白密码不能重复');
            $table->ipAddress('ip')->comment('发布表达的客户端ip地址');
            $table->boolean('is_show')->default(true)->comment('是否在表白墙展示，默认为是');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 删除传情应用数据表
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expressions');
    }
}
