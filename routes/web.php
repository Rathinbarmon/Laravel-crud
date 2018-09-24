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
    return view('welcome');
});
//pages route
Route::get('/addcontact','AdminController@add_contact');
Route::get('/dashboard','AdminController@dashboard');
Route::get('/allcontact','AdminController@all_contact');
Route::post('/save_contact','AdminController@save_contact');
Route::get('/edit_conatct/{contact_id}','AdminController@edit_conatct');
Route::post('/update_conatact/{contact_id}','AdminController@update_conatact');
Route::get('/delete_conatct/{contact_id}','AdminController@delete_conatct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
