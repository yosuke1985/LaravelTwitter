<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Follow;
use App\Models\User;




class UsersListViewController extends Controller{

    public $user;


    public function __construct(){

        $this->middleware('auth');
        $this->user = Auth::user();
    }


    public function index(){

        $follows = User::find(Auth::user()->id)->followUsers; //relationでUserをとってくる。
        $users = $this->queryUsers();

//        \Log::debug("$follows");
        \Log::debug($follows);

        return view("UsersListView", ['follows' => $follows, 'users'=> $users]);
    }

    public function follow(Request $request){

        $follow = new Follow;
        $follow->follow_user_id = Auth::user()['id'];
        $follow->followed_user_id = $request['user_id'];
        $follow->save();

        $users = $this->queryUsers();
        return view("UsersListView", ['users' => $users]);
    }




    function queryUsers(){
        $users = DB::table('users') // Collection型でstndClassのインスタンス
            ->select(["users.id","users.name","users.updated_at"])
            ->orderBy('users.updated_at', 'desc')
            ->get();


        $users = $users->map(function ($item){
            $item = array(
                "name" => $item->name,
                "updated_at" => $item->updated_at,
                "id"=> $item->id

            );

            return $item;//Array型
        }
        );

        return $users;
    }


}



