<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Auth;
use App\Confession;

class AdminController extends Controller
{
    private $api;

    public function __construct(){
      $this->middleware(function($request,$next){
        if(Auth::check() == false) return redirect()->to('/');
        $token = Auth::user()->social->provider_token;
        #fixed this issue by https://github.com/facebook/php-graph-sdk/issues/754
        $fb = new Facebook(['http_client_handler' => 'stream']);
        $fb->setDefaultAccessToken($token);
        $this->api = $fb;
        return $next($request);
      });
    }

    public function index(){
      $userProfile = $this->getUserProfile();

      if(!$userProfile){
        return "Cannot get facebook profile";
      }

      $avatar = json_decode($userProfile['picture'],true)['url'];

      $confessions = $this->getConfessionData();

      //command this for testing new blade
      return view('dashBoard',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
      //return view('recoverConfessions',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
      //return view('approvedConfessions',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
    }

    private function getUserProfile(){
      $userProfile = null;

      try{
        $params = "first_name,last_name,picture,email,birthday,age_range,gender";
        $userProfile = $this->api->get('/me?fields='.$params)->getGraphUser();
      }catch(FacebookSDKException $e){

      }

      return $userProfile;
    }

    private function getConfessionData(){
      $confessions = Confession::where('status','=','no_approve')->orderBy('id','asc')->get();
      return $confessions;
    }
}
