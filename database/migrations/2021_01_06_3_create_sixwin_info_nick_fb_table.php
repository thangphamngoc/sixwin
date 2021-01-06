<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinInfoNickFbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_info_nick_fb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable($value = false);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active')->default($value=true);
            $table->string('nick_name')->nullable($value = false);
            $table->string('url_fb')->nullable($value = false);
            $table->string('username_fb');
            $table->string('password_fb')->nullable($value = false);
            $table->string('image_fb');
            $table->string('url_local_image');
            $table->string('status_nick')->nullable($value = false); //0 chết // 1 sống //2 đầy
            $table->integer('number_friend')->nullable($value = false);
            $table->foreign('user_id')->references('id')->on('sixwin_user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_info_nick_fb');
    }
}
