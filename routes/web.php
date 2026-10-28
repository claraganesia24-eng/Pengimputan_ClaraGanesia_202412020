
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy']);
