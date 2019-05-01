<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hdmHome');
});
Route::get('/t', function () {
    return view('thankyouPage');
});
Route::post('/insert','savecfsController@insert');

Auth::routes();

Route::get('/h', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('loginwithFacebook');;
 
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderFacebookCallback');

Route::group(['middleware' => [
    'auth'
]], function(){
	Route::get('/admin', 'adminController@load');
    Route::get('/user', 'GraphController@retrieveUserProfile');
    Route::get('/page/id={id}', 'GraphController@publishToPage');
});