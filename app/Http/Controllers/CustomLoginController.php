<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{
    public function pre_login(){
      return view('processtoDashboard');
    }
    public function login(){
      if(Auth::check()){
        return redirect()->to('/admin');
      }

      return redirect()->to('/redirect/facebook');
    }

    public function logout(){
      if(Auth::check()){
        Auth::logout();
      }
      return redirect()->to('/');
    }
}
