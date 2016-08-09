<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function(Blueprint $table){
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('ticket_id');
        $table->string('root_cause')->nullable();
        $table->string('action_required')->nullable();
        $table->string('corrective_action')->nullable();
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
        Schema::drop('comments');
    }
}
