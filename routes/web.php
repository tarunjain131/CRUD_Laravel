<?php

use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[StudentController::class,'index'])->name('home');
Route::get('/fetch_data',[StudentController::class,'index']);
Route::get('/create',[StudentController::class,'create']);
Route::post('/store',[StudentController::class,'store'])->name('store');
Route::get('/{id}/show',[StudentController::class, 'show'])->name('show');
Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
Route::delete('/{id}/delete',[StudentController::class, 'destroy'])->name('delete');

