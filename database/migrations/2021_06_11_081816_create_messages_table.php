<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->text('subject')->nullable();
            $table->dateTime('message_date',0)->nullable();
            $table->bigInteger('from_user_id')->unsigned()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->nullable();
            $table->bigInteger('from_shop_id')->unsigned()->nullable();
            $table->integer('make_read');

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
        Schema::dropIfExists('messages');
    }
}
