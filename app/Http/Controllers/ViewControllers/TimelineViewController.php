<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TimelineViewController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $user = Auth::user();
        return view('TimelineView', ['user'=>$user,'msg'=>'']);
    }

    public  function post(Request $request){
        echo $request->msg;
        return view("TimelineView", ['msg'=>$request->msg]);
    }





}
