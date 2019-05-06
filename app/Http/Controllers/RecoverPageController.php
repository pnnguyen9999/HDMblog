<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeletedConfession;
use App\Confession;

class RecoverPageController extends Controller
{
    public function index(){
      $confessions = Confession::where('status','=','deleted')->get();

      return view('recoverConfessions')->with('confessions',$confessions);
    }
}
