<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('login', 'AuthController@index');
Route::get('/', 'HomeController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');
Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');

Route::resource('account-heads', 'AccountHeadController');
Route::post('account-heads/info', 'AccountHeadController@info');
Route::resource('jvs', 'JVController');
Route::get('general-ledgers', 'GeneralLedgerController@index');
Route::get('general-ledgers/send', 'GeneralLedgerController@send')->name('general-ledgers.send');
Route::post('general-ledgers/send', 'GeneralLedgerController@sendPost')->name('general-ledgers.sendPost');
Route::get('general-ledgers/export', 'GeneralLedgerController@export');
