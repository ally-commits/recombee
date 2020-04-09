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

Route::get("/","DashboardController@index")->name("dashboard"); 
Route::get("/add-data","DashboardController@addData");
Route::get("/view-data","DashboardController@viewData")->name("viewData");
Route::post("/add-data","DashboardController@submitData");
Route::post("/rand-add","DashboardController@randAdd");
Route::get("/users","DashboardController@users");
Route::get("/contents","DashboardController@contents");
Route::get("/reset-data","DashboardController@resetData");
Route::post("/get-recom", "DashboardController@getRecom");


