<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;


class AllTweetViewController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tweets = Tweet::orderBy('updated_at', 'desc')->get();

//        $tweets = $tweets->map(function ($item) {
//            $item = collect($item)->forget('created_at')->forget('user_id');
//            return $item;
//        });
        $user = Auth::user();


        $tweets = DB::select('select * from users inner join tweets on users.id = tweets.user_id');
        \Log::debug($tweets[0]->name);

        return view('AllTweetView', ['user'=> $user, 'tweets'=> $tweets]);
    }


    public  function post(Request $request){
        $user = Auth::user();

        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();

        $tweets = Tweet::orderBy('updated_at', 'desc')->get();
        $tweets = $tweets->map(function ($item) {
            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
            return $item;
        });

//        \Log::debug(Tweet::find(1)->user);
        \Log::debug(Auth::user());

        return view("AllTweetView", ['user' =>$user ,'tweets'=> $tweets]);

    }







}
