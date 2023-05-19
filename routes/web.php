<?php

use App\Http\Controllers\Admin\KategorilerController;
use App\Http\Controllers\Admin\MusterilerController;
use App\Http\Controllers\Admin\SatisController;
use App\Http\Controllers\Admin\UrunlerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UrunlerController::class)->prefix('urun')->group(function () {
    Route::get('/',  'index')->name('urun-index');
    Route::get('/ekle',  'create')->name('urun-ekle');
    Route::post('/create',  'store')->name('urun-add');
    Route::get('/duzenle/{id}',  'edit')->name('urun-duzenle');
    Route::post('/update/{id}',  'update')->name('urun-update');
    Route::delete('/delete/{id}',  'destroy')->name('urun-delete');
    // Route::get('/silinenler',  'trashed')->name('document-trashed');
    // Route::post('/restore', 'restore')->name('document-restore');
    // Route::post('/harddelete', 'harddelete')->name('document-harddelete');

});
Route::controller(KategorilerController::class)->prefix('kategori')->group(function () {
    Route::get('/',  'index')->name('kategori-index');
    Route::get('/ekle',  'create')->name('kategori-ekle');
    Route::post('/create',  'store')->name('kategori-add');
    Route::get('/duzenle/{id}',  'edit')->name('kategori-duzenle');
    Route::post('/update/{id}',  'update')->name('kategori-update');
    Route::delete('/delete/{id}',  'destroy')->name('kategori-delete');
    // Route::get('/silinenler',  'trashed')->name('document-trashed');
    // Route::post('/restore', 'restore')->name('document-restore');
    // Route::post('/harddelete', 'harddelete')->name('document-harddelete');

});
Route::controller(MusterilerController::class)->prefix('musteri')->group(function () {
    Route::get('/',  'index')->name('musteri-index');
    Route::get('/ekle',  'create')->name('musteri-ekle');
    Route::post('/create',  'store')->name('musteri-add');
    Route::get('/duzenle/{id}',  'edit')->name('musteri-duzenle');
    Route::post('/update/{id}',  'update')->name('musteri-update');
    Route::delete('/delete/{id}',  'destroy')->name('musteri-delete');
    // Route::get('/silinenler',  'trashed')->name('document-trashed');
    // Route::post('/restore', 'restore')->name('document-restore');
    // Route::post('/harddelete', 'harddelete')->name('document-harddelete');

});
Route::controller(SatisController::class)->prefix('satis')->group(function () {
    Route::get('/',  'index')->name('satis-index');
    Route::get('/satis-yap',  'create')->name('satis-ekle');
    Route::post('/create',  'store')->name('satis-add');
    // Route::get('/duzenle/{id}',  'edit')->name('musteri-duzenle');
    // Route::post('/update/{id}',  'update')->name('musteri-update');
    // Route::delete('/delete/{id}',  'destroy')->name('musteri-delete');
    // Route::get('/silinenler',  'trashed')->name('document-trashed');
    // Route::post('/restore', 'restore')->name('document-restore');
    // Route::post('/harddelete', 'harddelete')->name('document-harddelete');

});
