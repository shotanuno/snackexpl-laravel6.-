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

Route::get('/', 'SnackController@index');
/* createのルーティングは上側 */
Route::get('/snacks/create', 'SnackController@create');
Route::get('/snacks/{snack}/edit', 'SnackController@edit');
Route::get('/snacks/{snack}', 'SnackController@detail');
Route::put('/snacks/{snack}', 'SnackController@update');
Route::post('/snacks', 'SnackController@store');
Route::delete('/snacks/{snack}', 'SnackController@delete');

Auth::routes();

?>