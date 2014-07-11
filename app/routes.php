<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',  function()
{
	return View::make('index');
});

Route::get('/admin', ['before'=>'auth', function(){
	return View::make('admin');
}]);

Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::post('sessions/store', 'SessionController@store');


Route::group(['prefix' => 'api/v1'], function(){
	Route::resource('polls', 'PollsController');
	Route::get('polls/{pollsId}/answers', 'AnswersController@index');
	Route::post('polls/{pollsId}/answers', 'AnswersController@store');
	Route::put('answers/{answerId}/update', 'AnswersController@update');
	Route::put('answers/{answerId}/vote', 'AnswersController@vote');
	Route::delete('answers/{answerId}', 'AnswersController@destroy');
});