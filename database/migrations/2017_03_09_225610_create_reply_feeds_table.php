<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('评论用户id');
            $table->unsignedInteger('feed_id')->comment('评论说说id');
            $table->string('content')->comment('评论内容');
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
        Schema::dropIfExists('reply_feeds');
    }
}
