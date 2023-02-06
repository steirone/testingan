<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/accountq','App\Http\Controllers\AccountController@all');
Route::get('/accountq/{id}','App\Http\Controllers\AccountController@show');
Route::post('/accountq/login','App\Http\Controllers\AccountController@login');
Route::post('/accountq','App\Http\Controllers\AccountController@store');
Route::put('/accountq/{id}','App\Http\Controllers\AccountController@update');
Route::put('/accountq/role/{id}','App\Http\Controllers\AccountController@updaterole');
Route::delete('/accountq/{id}','App\Http\Controllers\AccountController@delete');

Route::get('/pegawai','App\Http\Controllers\PegawaiController@all');
Route::get('/pegawai/{id}','App\Http\Controllers\PegawaiController@show');
Route::get('/pegawai/nama/{id}','App\Http\Controllers\PegawaiController@nama');
Route::post('/pegawai','App\Http\Controllers\PegawaiController@store');
Route::put('/pegawai/{id}','App\Http\Controllers\PegawaiController@update');
Route::delete('/pegawai/{id}','App\Http\Controllers\PegawaiController@delete');

Route::get('/approval','App\Http\Controllers\ApprovalController@all');
Route::get('/approval/{id}','App\Http\Controllers\ApprovalController@show');
Route::get('/approval/username/{id}','App\Http\Controllers\ApprovalController@username');
Route::post('/approval','App\Http\Controllers\ApprovalController@store');
Route::put('/approval/{id}','App\Http\Controllers\ApprovalController@update');
Route::delete('/approval/{id}','App\Http\Controllers\ApprovalController@delete');

Route::get('/cuti','App\Http\Controllers\CutiController@all');
Route::get('/cuti/{id}','App\Http\Controllers\CutiController@show');
Route::get('/cuti/username/{id}','App\Http\Controllers\CutiController@username');
Route::post('/cuti','App\Http\Controllers\CutiController@store');
Route::put('/cuti/{id}','App\Http\Controllers\CutiController@update');
Route::delete('/cuti/{id}','App\Http\Controllers\CutiController@delete');