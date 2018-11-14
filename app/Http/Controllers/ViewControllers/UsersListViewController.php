<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UsersListViewController extends Controller{

    public $user;


    public function __construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function index(){
//        echo "Hello Social";

        $users = $this->queryUsers();

        return view("UsersListView", ['users' => $users]);


    }


    function queryUsers(){
        $users = DB::table('users')
            ->select(["users.name","users.updated_at",])
            ->orderBy('users.updated_at', 'desc')
            ->get();
        // Collection型でstndClassのインスタンス

        $users = $users->map(function ($item){
            $item = array(
                "name" => $item->name,
                "updated_at" => $item->updated_at
            );

            return $item;
        }
        );

        return $users;
    }


}
