<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//auth for google
Route::get('auth/google', 'Auth\AuthController@redirectToProvider_google');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback_google');


/*Route::get('home',function(){
	return view('layout');
});*/



Route::resource('profiles','profileController');

Route::resource('questions','questionController');

Route::resource('questions','questionController');

Route::post('answers/{id}','answerController@save');


Route::get('profiles/{id}', array('as' => 'profile', 'uses' => 'profileController@show'));

Route::post('profiles/{id}/photos','profileController@addPhoto');

Route::get('home',array('as'=>'home_ques','uses'=>'questionController@show'));

Route::get('question/{question}',array('as'=>'answer','uses'=>'questionController@display'));

Route::post('vote/{question}/{answer}','answerController@upvoted');
Route::post('downvote/{question}/{answer}','answerController@downvoted');

Route::get('topics/{topic}','questionController@showAllTopics');



