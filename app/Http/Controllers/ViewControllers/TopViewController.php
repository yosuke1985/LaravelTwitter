<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class TopViewController extends Controller{

    public $user;
    public $tweets;


    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->tweets = array();
    }


    //        $tweets = $this->queryForTweets();

    public function index(){

        $followList = $this->arrayFollowslist();// id=>nameのarray

        $this->timelineQuery($followList);

        \Log::debug($this->tweets);// array

        return view('TopView', ['user'=>$this->user, 'tweets'=>$this->tweets]);
    }

    public function post(Request $request){

        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user_id =  Auth::user()->id;
        $tweet->save();

        $tweets = $this->queryForTweets();

        return view("TopView", ['user' => $this->user,'tweets'=>$tweets]);
    }

    function queryForTweets(){
        $tweets = DB::table('users')
            ->select(["users.name", "users.id", "users.created_at as users_created_at",
                "users.updated_at as users_updated_at", "tweets.tweet", "tweets.created_at as tweets_created_at",
                "tweets.updated_at as tweets_updated_at"])
            ->join('tweets', 'users.id', '=', 'tweets.user_id')
            ->where("tweets.user_id", Auth::user()->id)
            ->orderBy('tweets.updated_at', 'desc')
            ->get();
        // Collection型でstndClassのインスタンス

        $tweets = $tweets->map(function ($item){
            $item = array(
                "name" => $item->name,
                "tweet" => $item->tweet,
                "updated_at" => $item->tweets_updated_at
            );

            return $item;
        }
        );


        return $tweets;
    }


    function arrayFollowslist(){

        $follows = DB::table("follows")->select(["followed_user_id", "follow_user_id","users.name as followed_name" ])
            ->join("users", "follows.followed_user_id","=", "users.id")
            ->where("follows.follow_user_id", Auth::user()->id)
            ->whereNull("users.deleted_at")
            ->get();

        \Log::debug($follows);
        //ユーザー一覧　フォローしている人のユーザーidで取ってくる。

        $followed_list = array();
        foreach ($follows as $follow){
            $followed_list[$follow->followed_user_id] = $follow->followed_name;
        }

        //必要なものだけにする。

        return $followed_list; // Array

    }


    function timelineQuery(Array $followList){

        //foreachを使わず、followしているユーザーのtweetをとってくる。
        foreach ($followList as $key => $value) {
            \Log::debug($key);
            \Log::debug($value);

            $tweet = DB::table("tweets")
                ->select(["tweets.user_id", "tweets.tweet", "tweets.updated_at", "users.name"])
                ->join("users", "tweets.user_id", "=", "users.id")
                ->where("tweets.user_id", "=", $key)
                ->orderBy("tweets.updated_at", 'desc')
                ->get();

            \Log::debug($tweet);// Collection
//            {"user_id":6,"tweet":"\u3054\u3049\u30fc\u308a\uff01","updated_at":"2018-11-15 06:46:44"}
            $tweet = $tweet->map(function ($item) {
                $item = array(
                    "name" => $item->name,
                    "tweet" => $item->tweet,
                    "updated_at" => $item->updated_at
                );
//                \Log::debug($item);

                return $item;
            }
            )->toArray();


            $this->tweets = array_merge($this->tweets, $tweet);
        }
    }

}

