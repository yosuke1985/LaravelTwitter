<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;



class TopViewController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $user = Auth::user();

        $tweets = Tweet::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();





        $tweets = DB::table('users')
            ->select(["users.name", "users.id", "users.created_at as users_created_at",
                "users.updated_at as users_updated_at", "tweets.tweet", "tweets.created_at as tweets_created_at"])
            ->join('tweets', 'users.id', '=', 'tweets.user_id')
            ->where("tweets.user_id", $user->id)
            ->get();




        \Log::debug($tweets);


        //ユーザー一覧　フォロー機能



//        $tweets = $tweets->map(function ($item) {
////            $item = array(
////                "name" => $item->name,
////                "tweet" => $item->tweet,
////                "updated_at" => $item->updated_at
////            );
////            return $item;
//
//            //collectionはLaravelのクラス
//            //php
//            $item = collect($item)->only(['name', 'tweet','tweets_created_at', 'users_created_at']);
//
//
//            return $item;
//
//
//        });

    // user created at,  tweet created at


        $user = Auth::user();
        return view('TopView', ['user'=>$user, 'tweets'=>$tweets]);

    }

    public  function post(Request $request){
        $request->msg;
//        return view("TimelineView", ['msg'=>$request->msg, 'user' => Auth::user()->name]);
        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();


//        $tweets = Tweet::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
//        $tweets = $tweets->map(function ($item) {
//            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
//            return $item;
//        });


        $user = Auth::user();

        return view("TopView", ['user' => $user,'tweets'=>$tweets]);

    }

}

//inner join
////        $tweets = DB::select("select * from users inner join tweets on users.id = tweets.user_id ");
///
//$tweets = DB::select("select users.name, users.id, users.created_at as users_created_at,
//                  users.updated_at as users_updated_at, tweets.tweet, tweets.created_at as tweets_created_at
//                  from users inner join tweets on users.id = tweets.user_id ");