<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{
    public function login(){
      return view('processtoDashboard');
    }

    public function logout(){
      if(Auth::check()){
        Auth::logout();
      }
      return redirect()->to('/');
    }
}
