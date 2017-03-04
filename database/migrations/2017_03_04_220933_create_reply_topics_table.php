<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('topic_id')->comment('回帖id');
            $table->unsignedInteger('user_id')->comment('回复用户id');
            $table->string('reply')->comment('回复内容');
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
        Schema::dropIfExists('reply_topics');
    }
}
