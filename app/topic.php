<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    //

    protected $table='topics';

    protected $primaryKey='id';

    protected $fillable=['question_topic'];


    //this is the connection between profile table and the topic table
    //has a relationship of one to many


    public function profiler_topic(){
    	return $this->belongsTo('App\User','user_id');
    }


    public function question_topic(){
    	return $this->hasMany('App\question','topic_id');
    }


}
