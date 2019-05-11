<?php
namespace App\Services;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Auth;

class FacebookGroupService{
	private $api;
	private $PAGE_ID = "1177029442331188";

	const PUBLISH_ERR = -1;
	const SUCCESS = 0;
	
	public function __construct(){
		$this->getFacebookAPI();
	}

	public function publishToPage($message){
		try{
			$this->api->post('/'.$this->PAGE_ID.'/feed',array('message' => $message),$this->getPageAccessToken());
			return 0;
		}catch(FacebookSDKException $e){
			return -1;
		}
	}

	public function publishConfession($order,$content){
		try{
			$message = "#cfs".$order.'
			'.$content;
			$this->api->post('/'.$this->PAGE_ID.'/feed',array('message' => $message),$this->getPageAccessToken());
		}catch(FacebookSDKException $e){
			return -1;
		}
	}

	private function getFacebookAPI(){
		if(Auth::check() == false) return "Cannot get token";

		$token = Auth::user()->social->provider_token;
		$this->api = new Facebook(['http_client_handler' => 'curl']);
		$this->api->setDefaultAccessToken($token);
	}

	private function getPageAccessToken(){
		try{
			$response = $this->api->get('/me/accounts');
		}catch(FacebookResponseException $e){
			echo 'Graph returned an error: '.$e->getMessage();
			exit;
		}catch(FacebookSDKException $e){
			echo 'Facebook SDK returned an error: '.$e->getMessage();
			exit;
		}

		try{
			$pages = $response->getGraphEdge()->asArray();
			foreach($pages as $key){
				if($key['id'] == $this->PAGE_ID){
					return $key['access_token'];
				}
			}
		}catch(FacebookSDKException $e){
			dd($e);
		}
	}
}
