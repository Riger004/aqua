<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    protected $table='questions';

    protected $primaryKey='id';

    protected $fillable=['anonymously','question','details'];


    public function user_question(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function topic_of_question(){
    	return $this->belongsTo('App\topic','topic_id');
    }

    public function question_answer(){
    	return $this->hanMany('App\answer','question_id');
    }









}
