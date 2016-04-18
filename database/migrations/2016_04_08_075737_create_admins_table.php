<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admins', function(Blueprint $table){

           $table->increments('id');
           $table->string('email');
           $table->string('username');
           $table->string('password');
           $table->string('first_name');
           $table->string('last_name');
           $table->boolean('sudo_admin');
           $table->string('remember_token')->nullable();
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
        Schema::drop('admins');
    }
}