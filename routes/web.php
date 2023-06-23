<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EtudiantController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/test', function () {
    return view('test');
});

Route::get('/home', function ()
{
    return view('welcome');
})->name('home')->middleware('auth');


Route::get('/register', [AuthController::class, 'registerView'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [AuthController::class, 'loginView'])->name('login.view')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    Route::post('/profile/update/infos', [ProfileController::class, 'updateInfos'])->name('profile.update.infos');
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    
    
    Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
    
    Route::get('/etudiant/edit/{id}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::post('/etudiant/update/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');
    
    
    Route::get('/etudiant/create', function () {
        return view('etudiant.create');
    })->name('etudiant.create');
    
    Route::post('/etudiant/store', [EtudiantController::class, 'store'])->name('etudiant.store');
    
    Route::post('/etudiant/delete/{id}', [EtudiantController::class, 'delete'])->name('etudiant.delete');
});

