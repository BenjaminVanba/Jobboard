<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home'); // 'home' correspond à home.blade.php
});
