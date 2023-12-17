<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login.post');
Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::get('register', [\App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register/create', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.post');
Route::get('/home', [\App\Http\Controllers\CalonMahasiswaController::class, 'create'])->name('calon_mahasiswa.create');
Route::post('/home', [\App\Http\Controllers\CalonMahasiswaController::class, 'store'])->name('calon_mahasiswa.store');
Route::get('/home/status', [\App\Http\Controllers\CalonMahasiswaController::class, 'index'])->name('calon_mahasiswa.show');
Route::get('/generate-pdf/{id}', [PDFController::class, 'printPDF'])->name('generatePDF');

Route::post('/getKabupaten', [AdminController::class, 'getKabupaten'])->name('getKabupaten');
Route::post('/getKecamatan', [AdminController::class, 'getKecamatan'])->name('getKecamatan');

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/user/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('admin/students', [AdminController::class, 'index'])->name('admin.students.index');
    Route::get('admin/students/{id}', [AdminController::class, 'show'])->name('admin.students.show');
    Route::put('admin/students/update/{id}', [AdminController::class, 'update'])->name('admin.students.update');
    Route::delete('admin/students/delete/{id}', [AdminController::class, 'destroy'])->name('admin.students.destroy');
});
