<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    //
    protected $table='profile';


     protected $primaryKey='id';


    protected $fillable = ['about', 'employment','education','location','bio','description'];

     public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function scopeExist($query,$user_id){

    	return $query->where(compact('user_id'));
    }

}
