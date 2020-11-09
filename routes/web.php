<?php

Route::get('/', function() {
    return view('home');
});

Route::post('/polls','App\Http\Controllers\PollController@store');

Route::get('/polls/{id}','App\Http\Controllers\PollController@show');

Route::post('/polls/{poll}/vote','App\Http\Controllers\VoteController@store');
