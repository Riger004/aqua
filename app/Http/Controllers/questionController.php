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
use App\answer;
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

       $count=$topic->count+1;


       $affected = DB::update('update topics set count = :vote where id = :id', ['vote'=>$count,'id'=>$topic->id]);

       //return $topic->id;

       $question=new question;

       $question->user_id=$user['id'];



       $question->topic_id=$topic->id;
       if($request->anonymously==='Yes'){
        $question->anonymously=1;
    }else{
        $question->anonymously=0;
    }
    $question->question=$request->question;

    $question->details=$request->details;

    $question->save();

        //$topic->question_topic()->create($request->all());

    return redirect()->action('questionController@show');


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

        $topic_count=DB::select('select question_topic from topics order by count desc');


        return view('show.home',compact('question','topic_count'));

    }

    public function display($id){

        //echo ($id);

     $id=urldecode($id);

     $question=question::where('question',$id)->get()->first();


     $topic=topic::where('id',$question->topic_id)->get()->first();

     $answer=answer::where('question',$id)->get();

     if($answer!==null){
         $name=DB::select('select name, users.id,answer, question, preffered, upvoted , downvoted from users inner join answers on users.id=answers.user_id');

         return view('show.answer',compact('question','topic','name'));

         //   return $answer;
     }else{
        return view('show.answer',compact('question','topic'));
    }
        //return $id;
}

    
    public function showAllTopics($topic){

        $topic=urldecode($topic);

        $topic_id=DB::select('select id from topics where question_topic=:qu',['qu'=>$topic]);

        $id;
        foreach ($topic_id as $key ) {
            $id=$key->id;
        }

        $question=DB::select('select DISTINCT question from questions where questions.topic_id=:id',['id'=>$id]);

        return view('show.topic',compact('question','topic'));

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
