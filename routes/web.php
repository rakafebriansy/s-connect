<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GuestController::class,'index']);

Route::get('/profil',[GuestController::class,'indexProfil']);
Route::prefix('/potensi')->group(function(){
    Route::get('/',[GuestController::class,'indexPotensi'])->name('potensi.index');
});
Route::prefix('/wisata')->group(function(){
    Route::get('/',[GuestController::class,'indexWisata'])->name('wisata.index');
});
Route::prefix('/berita')->group(function(){
    Route::get('/',[GuestController::class,'indexBerita'])->name('berita.index');
    Route::get('/{id}',[GuestController::class,'showBerita'])->name('berita.show');
});
Route::prefix('/pengaduan')->group(function(){
    Route::get('/',[GuestController::class,'createPengaduan'])->name('pengaduan.create');
    Route::post('/',[GuestController::class,'storePengaduan'])->name('pengaduan.store');
});