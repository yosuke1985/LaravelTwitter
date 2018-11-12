<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;



class TopViewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){


        $tweets = Tweet::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        $tweets = $tweets->map(function ($item) {
            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
            return $item;
        });


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


        $tweets = Tweet::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        $tweets = $tweets->map(function ($item) {
            $item = collect($item)->forget('created_at')->forget('id')->forget('user_id');
            return $item;
        });
        $user = Auth::user();



        return view("TopView", ['user' => $user,'tweets'=>$tweets]);

    }

}
