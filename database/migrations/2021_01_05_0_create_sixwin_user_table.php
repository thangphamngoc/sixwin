<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSixwinUserTable extends Migration
{
    // php artisan make:migration create_sixwin_user_table --create=sixwin_user
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sixwin_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('id_create');
            $table->string('create_by');

            $table->boolean('del_active')->default($value=true);
            $table->string('app_type')->nullable($value = false); // plus, employee,system
            $table->string('full_name')->nullable($value = false);
            $table->string('gender');
            $table->string('password_hash')->nullable($value = false);
            $table->integer('phone');
            $table->string('username')->nullable($value = false);
            $table->string('password_show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sixwin_user');
    }
}
