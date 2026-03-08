<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return env('CREATOR_NAME');
});
