<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_school', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('updated_at')->useCurrent()->nullable($value = false);
            $table->timestamp('created_at')->useCurrent()->nullable($value = false);
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active');
            $table->integer('school_active');
            $table->string('school_avatar');
            $table->string('school_address');
            $table->string('school_code');
            $table->string('school_description');
            $table->string('school_email');
            $table->string('school_local_avatar');
            $table->string('school_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_school');
    }
}
