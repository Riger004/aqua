<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\profiles;
use App\User;
use App\topic;
use App\answer;
use App\question;
use DB;

class answerController extends Controller
{


   public function __construct(){
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'here in index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'here in create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        return 'here in store';
    }


    public function save($id2, Request $request){

     $id=urldecode($id2);

        //$question=DB::select('select * from questions where question = :id',['id'=>$id]);

     $question=question::where('question',$id)->get()->first();


       // $question->question_answer()->create(["user_id" => Auth::user()->id],$request->all());

     $answer=new answer;

     $answer->question=$question->question;
     $answer->user_id=Auth::user()->id;
     $answer->answer=$request['answer'];
     $answer->save();

     return redirect()->route('answer', ['question'=> urlencode($id2)]);


 }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
     return 'here in edit';
 }


 public function upvoted($question,$answer,Request $request)
 {
    $upvote=DB::select('select upvoted from answers where question= :qu and answer=:ans', ['qu'=>urldecode($question),'ans'=>urldecode($answer)]);
    $val=1;
    foreach ($upvote as $key ) {
        $val=$val+$key->upvoted;
    }

    $affected = DB::update('update answers set upvoted = :vote where question = :qu and answer=:ans', ['vote'=>$val,'qu'=>urldecode($question),'ans'=>urldecode($answer)]);

     return redirect()->route('answer', ['question'=> urlencode($question)]);

   
}

 public function downvoted($question,$answer,Request $request)
 {
    $downvote=DB::select('select downvoted from answers where question= :qu and answer=:ans', ['qu'=>urldecode($question),'ans'=>urldecode($answer)]);
    $val=1;
    foreach ($downvote as $key ) {
        $val=$val+$key->downvoted;
    }

    $affected = DB::update('update answers set downvoted = :vote where question = :qu and answer=:ans', ['vote'=>$val,'qu'=>urldecode($question),'ans'=>urldecode($answer)]);

     return redirect()->route('answer', ['question'=> urlencode($question)]);

   
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return 'here update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
