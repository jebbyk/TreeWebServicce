<?php

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

Route::prefix("elements")->group(function(){
    Route::get("/", "ElementController@get")->name("get");
    Route::post("/delete", "ElementController@delete")->name("delete");
    Route::post("/changeParent", "ElementController@changeParent")->name("changeParent");
});
