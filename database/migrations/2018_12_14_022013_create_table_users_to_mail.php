<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersToMail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_to_mail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('mail_id');
            $table->string('send_time')->comment('消息发送时间');
            $table->integer('status')->comment('消息状态， 0： 未读， 1： 已读');
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
        Schema::dropIfExists('users_to_mail');
    }
}
