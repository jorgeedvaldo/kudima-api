<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/como-funciona', function () {
    return view('pages.como-funciona');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/cadastro', function () {
    return view('pages.cadastro');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'Storage linked successfully';
});
