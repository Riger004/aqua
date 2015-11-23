<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    //
    protected $table='answers';

    protected $primaryKey='id';

    protected $fillable=['answer'];


    public function answerd_by_User(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function answered_of_a_question(){
    	return $this->belongsTo('App\question','question_id');
    }



}
