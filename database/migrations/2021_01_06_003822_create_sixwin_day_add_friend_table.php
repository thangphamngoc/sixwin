<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinDayAddFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_day_add_friend', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('info_nick_fb_id')->unsigned()->nullable($value = false);
            $table->bigInteger('day_add_id')->unsigned()->nullable($value = false);
            // $table->bigInteger('info_nick_fb_id')->unsigned()->nullable($value = false);
            // $table->bigInteger('day_add_id')->unsigned()->nullable($value = false);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active')->default($value=true);
            $table->date('date_add')->nullable($value = false);
            $table->integer('from_number')->nullable($value = false);
            $table->integer('to_number')->nullable($value = false);
            $table->integer('from_number_group')->nullable($value = false);
            $table->integer('to_number_group')->nullable($value = false);
            $table->string('image_add_day');
            $table->string('url_local_image_day');
            $table->string('image_add_group');
            $table->string('url_local_image_add_group');
            $table->string('nick_name')->nullable($value = false);
            $table->foreign('info_nick_fb_id')->references('id')->on('sixwin_info_nick_fb');
            $table->foreign('day_add_id')->references('id')->on('sixwin_day_add');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_day_add_friend');
    }
}
