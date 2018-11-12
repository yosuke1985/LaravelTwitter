<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tweet;


class TimelineViewController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $tweets = Tweet::where('user_id', 1)->orderBy('updated_at', 'desc')->get();

        \Log::debug($tweets);
        \Log::debug("hello world");

        $tweets = $tweets->map(function ($item) {
            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
            return $item;
        });



        return view('TimelineView', ['user'=> Auth::user(),'msg'=>$tweets, 'tweets'=> $tweets]);
    }

    public  function post(Request $request){
        $request->msg;
//        return view("TimelineView", ['msg'=>$request->msg, 'user' => Auth::user()->name]);
        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();


        return view("TimelineView", ['user' => Auth::user()->name,'msg'=>$request->msg,]);

    }







}
