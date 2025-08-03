<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GuestController::class,'index']);

Route::prefix('/berita')->group(function(){
    Route::get('/',[GuestController::class,'indexBerita'])->name('berita.index');
    Route::get('/{id}',[GuestController::class,'showBerita'])->name('berita.show');
});