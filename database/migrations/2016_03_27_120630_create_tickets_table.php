<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create tickets tabble woth the following fields
        Schema::create('tickets', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('category');
            $table->string('priority');
            $table->string('subject');
            $table->string('message');
            $table->string('ticket_no');
            $table->string('attachment')->nullable();
            $table->string('status')->nullable();
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
        Scehma::drop('tickets');
    }
}
