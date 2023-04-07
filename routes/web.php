<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\medcinController::class, 'index']
)->name('medcin.index');

Route::get('/specialite', [App\Http\Controllers\medcinController::class, 'showBySpecialite'])->name('medecins.specialite');
Route::get('/medecin', [App\Http\Controllers\medcinController::class, 'showByVille'])->name('medecins.ville');
