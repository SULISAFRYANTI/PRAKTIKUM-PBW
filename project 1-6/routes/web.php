<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

Route::get('/',[HomeController::class, 'index'] );
Route::get('/about', [AboutController::class,'index'] );
Route::get('/contact', [ContactController::class,'index'] );
Route::get('/gallery', [GalleryController::class,'index'] );

Route::get('users', function () {
    $users = [
        ['id' => 1, 'name' => 'John Doe'],
        ['id' => 2, 'name' => 'Jane Doe'],
    ];
    return view('users.index', compact('users'));
});
