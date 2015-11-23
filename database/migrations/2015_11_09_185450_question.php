<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('questions',function(Blueprint $table){
            $table->increments('íd');
            $table->integer('user_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->boolean('anonymously');
            $table->text('question');
            $table->mediumText('details')->nullable();

           

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
        //
        Schema::drop('questions');
    }
}
