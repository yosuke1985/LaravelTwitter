<?php

namespace App\Http\Controllers\ViewControllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RegisterViewController extends Controller
{


    public function index(){
//        return "RegisterViewController's index here";
        return view('RegisterView');

    }

}
