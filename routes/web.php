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

Route::get("/", "TextController@showRandomText")->name("show_random_text");
Route::get("/toplist", "TextController@topList")->name("top_list");
Route::get("/{id}", "TextController@showText")->name("show_text");
Route::post("/upvote/{id}", "TextController@upvote")->name("upvote");
Route::post("/downvote/{id}", "TextController@downvote")->name("downvote");
