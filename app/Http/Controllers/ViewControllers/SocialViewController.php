<?php

namespace App\Http\Controllers\ViewControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialViewController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
//        echo "Hello Social";
        return view('SocialView');

    }


    }
