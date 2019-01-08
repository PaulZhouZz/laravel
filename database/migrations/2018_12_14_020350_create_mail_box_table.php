<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_box', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('消息标题');
            $table->dateTime('date')->comment('消息创建时间');
            $table->string('language')->comment('消息语言');
            $table->integer('type')->comment('消息类型, 0：公告， 1：站内信');
            $table->string('content')->comment('消息主体');
            $table->string('if_send')->comment('是否发送');
            $table->string('if_cancel')->comment('是否撤销');
            $table->string('cancel_time')->comment('撤销时间');
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
        Schema::dropIfExists('mail_box');
    }
}
