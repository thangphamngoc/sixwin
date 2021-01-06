<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinInfoEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_info_employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable($value = false);
            $table->bigInteger('school_id')->unsigned()->nullable($value = false);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active');
            $table->string('app_type'); // plus, employee,system
            $table->string('avatar');
            $table->date('birthday');
            $table->string('code');
            $table->date('contract_date');
            $table->string('education_level');
            $table->string('email');
            $table->string('employee_status'); // 0 nghỉ làm, 1 // đi làm , 2 nghỉ phép , 3 tạm nghỉ
            $table->date('end_date');
            $table->string('first_name');
            $table->integer('phone');
            $table->string('full_name');
            $table->string('gender');
            $table->string('last_name');
            $table->string('note');
            $table->string('url_local_avatar');
            $table->string('verify_code_admin');
            $table->string('verify_code_school');
            $table->foreign('user_id')->references('id')->on('sixwin_user');
            $table->foreign('school_id')->references('id')->on('sixwin_school');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_info_employee');
    }
}
