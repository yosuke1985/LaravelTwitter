<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tweet;


class AllTweetViewController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $tweets = Tweet::orderBy('updated_at', 'desc')->get();

        \Log::debug($tweets);
        \Log::debug("hello world");

        $tweets = $tweets->map(function ($item) {
            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
            return $item;
        });

        return view('allTweetView', ['user'=> Auth::user(), 'tweets'=> $tweets]);
    }


    public  function post(Request $request){
        $request->msg;
//        return view("TimelineView", ['msg'=>$request->msg, 'user' => Auth::user()->name]);
        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();


        return view("allTweetView", ['user' => Auth::user()->name,'msg'=>$request->msg,]);

    }







}
