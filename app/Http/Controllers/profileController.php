<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\profiles;
use App\User;

class profileController extends Controller
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



        $user=Auth::user();

        $check=profiles::where('user_id',$user['id'])->count();

       
        if($check===1){
            return redirect()->route('profile', ['id'=>$user["id"]]);
        }else{
            $person='new user';
           return view('show.profile',compact('person'));
            //return 'testing';
        }

     
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

        

       $user->profile()->create($request->all());

          return redirect()->route('profile', ['id'=>$user["id"]]);
   }


   public function addPhoto(Request $request){

       $file=$request->file('file');

       $name=time().$file->getClientOriginalName();

       $file->move('flyers/photos',$name);

       $user=Auth::user();

       $profile=profiles::Exist($user['id'])->get()->first();

       $profile->photo="/flyers/photos/{$name}";

       $profile->save();

        return redirect()->route('profile', ['id'=>$user["id"]]);
        
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


       $user=profiles::where('user_id',$id)->first();

       $person=User::where('id',$id)->first();

        return view('show.profile',compact('user','person'));
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
