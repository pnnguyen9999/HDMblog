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

Route::get('/','HomePageController@index')->name('home');

Route::post('/add_confession','ConfessionController@add')->name('add_confession');

/*For Facebook Login*/
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('/pre_login','CustomLoginController@pre_login');
Route::get('/login','CustomLoginController@login');
Route::get('/logout','CustomLoginController@logout');

Route::prefix('admin')->group(function(){
  Route::get('/','AdminController@index')->name('admin_dashboard');

  Route::prefix('confession')->group(function(){
    Route::post('/approve','ConfessionController@approve');
    Route::delete('/delete/{id}','ConfessionController@delete');
    Route::post('/merge_approve_confession','ConfessionController@merge_confession_and_approve');
  });
});
