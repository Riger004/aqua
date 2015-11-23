<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\profiles;
use App\User;
use App\topic;
use App\question;
use DB;

class questionController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user=Auth::user();

        $topic_exist=topic::where('question_topic',$request['question_topic'])->count();

        if($topic_exist!==1){

         $profile=User::where('id',$user['id'])->first();
         $profile->user_topic()->create($request->all());

           //$topic=topic::where('profile_id',$user['id'])->count();

     }

     $topic=topic::where('question_topic',$request['question_topic'])->get()->first();



       //return $topic->id;

     $question=new question;

     $question->user_id=$user['id'];



     $question->topic_id=$topic->id;
     if($request->anonymously==='Yes'){
        $question->anonymously=1;
    }else{
        $question->anonymously=1;
    }
    $question->question=$request->question;

    $question->details=$request->details;

    $question->save();

        //$topic->question_topic()->create($request->all());

    return 'done';


}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $question=DB::select('select name,anonymously,question,details from users inner join questions on users.id=questions.user_id ORDER BY questions.created_at');


       

       return view('show.home',compact('question'));
     
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
