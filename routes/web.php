<?php

use Illuminate\Support\Facades\Route;
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
});

Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');

Route::get('/etudiant/edit/{id}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::post('/etudiant/update/{id}', [EtudiantController::class, 'update'])->name('etudiant.update');


Route::get('/etudiant/create', function () {
    return view('etudiant.create');
})->name('etudiant.create');

Route::post('/etudiant/store', [EtudiantController::class, 'store'])->name('etudiant.store');

Route::post('/etudiant/delete/{id}', [EtudiantController::class, 'delete'])->name('etudiant.delete');
