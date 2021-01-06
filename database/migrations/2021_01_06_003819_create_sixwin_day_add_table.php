<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinDayAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_day_add', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('info_employee_id')->unsigned()->nullable($value = false);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active')->default($value=true);
            $table->date('date_add')->nullable($value = false);
            // $table->integer('from_number_day')->nullable($value = false);
            // $table->integer('to_number_day')->nullable($value = false);
            $table->integer('total_day');
            // $table->string('image_add_day');
            // $table->string('url_local_image_day');
            $table->string('total_add_group');
            // $table->string('image_add_group');
            // $table->string('url_local_group');
            $table->foreign('info_employee_id')->references('id')->on('sixwin_info_employee');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_day_add');
    }
}
