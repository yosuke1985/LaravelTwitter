<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;



class TopViewController extends Controller{

    public $user;


    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function index(){

        $user = Auth::user();

        $tweets = $this->query();

        //ユーザー一覧　フォロー機能

        return view('TopView', ['user'=>$this->user, 'tweets'=>$tweets]);

    }

    public function post(Request $request){

        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();

        $tweets = $this->query();


        return view("TopView", ['user' => $this->user,'tweets'=>$tweets]);

    }


    function query(){
        $tweets = DB::table('users')
            ->select(["users.name", "users.id", "users.created_at as users_created_at",
                "users.updated_at as users_updated_at", "tweets.tweet", "tweets.created_at as tweets_created_at"])
            ->join('tweets', 'users.id', '=', 'tweets.user_id')
            ->where("tweets.user_id", Auth::user()->id)
            ->get();

        $tweets = $tweets->map(function ($item){
            $item = array(
                "name" => $item->name,
                "tweet" => $item->tweet,
                "updated_at" => $item->users_updated_at
            );
            return $item;
        }
        );

        return $tweets;

    }

}

//inner join
////        $tweets = DB::select("select * from users inner join tweets on users.id = tweets.user_id ");
///
//$tweets = DB::select("select users.name, users.id, users.created_at as users_created_at,
//                  users.updated_at as users_updated_at, tweets.tweet, tweets.created_at as tweets_created_at
//                  from users inner join tweets on users.id = tweets.user_id ");


//arrayで指定したカラムだけ
//        $tweets = $tweets->map(function ($item) {
//            $item = array(
//                "name" => $item->name,
//                "tweet" => $item->tweet,
//                "updated_at" => $item->updated_at
//            );
//            return $item;
//        }
//
//            //collectionはLaravelのクラス
//            //php
//            $item = collect($item)->only(['name', 'tweet','tweets_created_at', 'users_created_at']);
//
//            return $item;
//        });


//\Log::debug("hereee");
//\Log::debug($tweets);