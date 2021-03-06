<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('answers',function(Blueprint $table){
            $table->increments('id');
            $table->text('question');
            $table->integer('user_id')->unsigned();
            $table->longText('answer');
            $table->boolean('preffered')->nullabe();
            $table->integer('upvoted')->nullabe();
            $table->integer('downvoted')->nullabe();
            $table->integer('share')->nullabe();
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
        Schema::drop('answers');
    }
}
