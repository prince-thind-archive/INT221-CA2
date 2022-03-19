<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Marks;
use App\Http\Controllers\Upload;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', function () {
    if (session()->has('user')) {
        return redirect('profile');
    }
    return view('login');
});
Route::get('/logout', function () {
    if (session()->has('user')) {
        session()->pull('user');
    }
    return redirect('login');
});
Route::post("login", [Auth::class, 'login']);

Route::get('profile', function () {
    if (session()->has('user')) {
        return view('profile');
    }
    return redirect('login');
});

Route::view('upload', 'upload');
Route::post("upload", [Upload::class, 'upload']);

Route::view('marks', 'marks');
Route::post("marks", [Marks::class, 'marks']);
