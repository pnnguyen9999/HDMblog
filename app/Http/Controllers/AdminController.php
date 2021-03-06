<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Auth;
use App\Confession;
use App\DeletedConfession;

class AdminController extends Controller
{
    private $api;

    public function __construct(){
      $this->middleware(function($request,$next){
        if(Auth::check() == false) return redirect()->to('/');
        $token = Auth::user()->social->provider_token;
        #fixed this issue by https://github.com/facebook/php-graph-sdk/issues/754
        $fb = new Facebook(['http_client_handler' => 'curl']);
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

      $confessions = $this->getConfessionByStatus('no_approve');
      return view('dashBoard',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
    }

    public function recoverpage(){
      $userProfile = $this->getUserProfile();

      if(!$userProfile){
        return "Cannot get facebook profile";
      }

      $avatar = json_decode($userProfile['picture'],true)['url'];

      $confessions = $this->getConfessionByStatus('deleted');
      
      return view('recoverConfessions',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
    }

    public function acceptedpage(){
      //some thing change
      $userProfile = $this->getUserProfile();

      if(!$userProfile){
        return "Cannot get facebook profile";
      }

      $avatar = json_decode($userProfile['picture'],true)['url'];

      $confessions = $this->getConfessionByStatus('approved');

      return view('approvedConfessions',['profile' => $userProfile,'avatar' => $avatar,'confessions' => $confessions]);
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

    private function getConfessionByStatus($status){
      $confessions = Confession::where('status','=',$status)->orderBy('id','asc')->get();
      return $confessions;
    }
}
