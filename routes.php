<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function (){

    Route::get('/', function (){
        dd('Done');
    });
});
