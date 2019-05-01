<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;
use DB;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $api;
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->token);
            $this->api = $fb;
            return $next($request);
        });
    }
    public function load()
    {
        try {
            $data = DB::table('cfs')->orderBy('id', 'asc')->get();
            $params = "first_name,last_name,picture,email,birthday,age_range,gender";

            $user = $this->api->get('/me?fields='.$params)->getGraphUser();
            //echo 'Name: ' . $user['picture'];
            $picture = json_decode($user['picture'], true);
            $avatar = $picture['url'];
            // $data = [
            //     'info' => [
            //         [
            //             'name' => $user['first_name'].' '.$user['last_name'],
            //             'email' => $user['email'],
            //             'avatar' => $picture['url']
            //         ]
            //     ]
            // ];
            //return view('dashBoard', ['data' => $data]);
            return view('dashBoard', compact('data','user','avatar'));
            //dd($user);

        } catch (FacebookSDKException $e) {

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
