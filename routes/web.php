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
Route::group(['middleware' => ['auth']], function(){
Route::get('/', 'SnackController@index');
Route::get('/snacks/create', 'SnackController@create');
Route::get('/comments/{snack}/create', 'CommentController@create');
/* createのルーティングは上側 */
Route::get('/snacks/random', 'SnackController@random');
Route::get('/snacks/{snack}/edit', 'SnackController@edit');
Route::get('/snacks/{snack}', 'SnackController@detail');
Route::put('/snacks/{snack}', 'SnackController@update');
Route::post('/snacks', 'SnackController@store');
Route::delete('/snacks/{snack}', 'SnackController@delete');

Route::get('/comments', 'CommentController@index');
Route::get('/comments/{comment}', 'CommentController@detail');
Route::get('/comments/{comment}/edit', 'CommentController@edit');
Route::put('/comments/{comment}', 'CommentController@update');
Route::post('/comments/{snack}', 'CommentController@store');
Route::delete('comments/{comment}', 'CommentController@delete');

});

Auth::routes();

?>