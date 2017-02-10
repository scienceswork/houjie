<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->comment('用户头像')->nullable();
            $table->string('school')->comment('学校')->nullable();
            $table->string('student_id', 20)->comment('学号')->nullable();
            $table->tinyInteger('sex')->comment('性别')->nullable();
            $table->string('real_name')->comment('真实姓名')->nullable();
            $table->string('introduction')->comment('个人简介')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('school');
            $table->dropColumn('student_id');
            $table->dropColumn('sex');
            $table->dropColumn('real_name');
            $table->dropColumn('introduction');
        });
    }
}
