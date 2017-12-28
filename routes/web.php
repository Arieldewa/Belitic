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

	Auth::routes();
Route::group(['middleware' => ['auth']], function () {
	Route::resource('agent','AgentController');
	Route::resource('product','ProductController');
	Route::resource('distribution','DistributionController');
	Route::resource('historystok','HistoryStokController');
	Route::get('cost','DistributionController@cost')->name('cost');
	Route::get('spk','SpkController@spk')->name('spk');
	Route::get('analisa','SpkController@saranDistribusi')->name('analisa');

	Route::get('dashboard','HomeController@dashboard')->name('dashboard');

});
	Route::get('/home', 'HomeController@index')->name('home');