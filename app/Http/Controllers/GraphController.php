<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class GraphController extends Controller
{
	private $api;
	public function __construct(Facebook $fb)
	{
		$this->middleware(function ($request, $next) use ($fb) {
			$fb->setDefaultAccessToken(Auth::user()->token);
			$this->api = $fb;
			return $next($request);
		});
	}

	public function retrieveUserProfile(){
		try {
			$page_id = '1177029442331188';
			$params = "first_name,last_name,picture,email,birthday,age_range,gender";

			$user = $this->api->get('/me?fields='.$params)->getGraphUser();
			//$response = $this->api->get('/page-id/feed',token);
			//echo 'Name: ' . $user['picture'];
			
			$post = $this->api->get('/' . $page_id . '/feed', $this->getPageAccessToken($page_id));
			//$post = $post->getGraphNode()->asArray();
			// $noidung = json_decode($user['picture'], true);
			// echo $picture['url'];

			dd($post);
			//dd($user);

		} catch (FacebookSDKException $e) {

		}

	}

	public function getPageAccessToken($page_id){
		try {
         // Get the \Facebook\GraphNodes\GraphUser object for the current user.
         // If you provided a 'default_access_token', the '{access-token}' is optional.
			$response = $this->api->get('/me/accounts', Auth::user()->token);
		} catch(FacebookResponseException $e) {
        // When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(FacebookSDKException $e) {
        // When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		try {
			$pages = $response->getGraphEdge()->asArray();
			foreach ($pages as $key) {
				if ($key['id'] == $page_id) {
					return $key['access_token'];
				}
			}
		} catch (FacebookSDKException $e) {
        dd($e); // handle exception
    	}
    	
	}
	public function publishToPage($id,Request $request){
		$data = DB::table('cfs')->get();
		$noidung = '#cfs'.$id.'
		'.DB::table('cfs')->where('id', $id)->value('noidung');
		$page_id = '1177029442331188';
		try {
			//$post = $this->api->post('/' . $page_id . '/feed', array('message' => $noidung), $this->getPageAccessToken($page_id));
			//$post = $post->getGraphNode()->asArray();

			//dd($post);
			$request->session()->flash('alert-success', 'Đã duyệt thành công');
			return redirect()->back();

		} catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }

	}
}