<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileTimelineViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = Auth::user();
        return view('ProfileTimelineView', ['user'=>$user]);

    }

}
