<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JadwalUjianController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\LandingController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home-page');
Route::get('/kelas', [LandingController::class, 'kelas'])->name('filter-kelas');
Route::get('/guru', [LandingController::class, 'guru'])->name('filter-guru');
Route::get('/export-pdf', [PDFController::class, 'exportPDF'])->name('export.pdf');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/kelas', 'kelas')->name('kelas');
        Route::get('/guru', 'guru')->name('guru');
    });

    Route::prefix('jadwal')->name('jadwal.')->controller(JadwalUjianController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-table', 'datatable')->name('datatable');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::delete('/delete', 'destroy')->name('destroy');
    });

    Route::prefix('mapel')->name('mapel.')->controller(MapelController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-table', 'datatable')->name('datatable');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::delete('/delete', 'destroy')->name('destroy');
    });

    Route::prefix('kelas')->name('kelas.')->controller(KelasController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-table', 'datatable')->name('datatable');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::delete('/delete', 'destroy')->name('destroy');
    });

    Route::prefix('guru')->name('guru.')->controller(GuruController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-table', 'datatable')->name('datatable');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::delete('/delete', 'destroy')->name('destroy');
    });

    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/data-table', 'datatable')->name('datatable');
        Route::post('/store', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::post('/store/siswa', 'storeSiswa')->name('store.siswa');
        Route::put('/update/siswa', 'updateSiswa')->name('update.siswa');
        Route::delete('/delete', 'destroy')->name('destroy');
    });
});

require __DIR__.'/auth.php';
