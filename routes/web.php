<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionEditorController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [LoginController::class,'index']);
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout']);
Route::post('/logout', [LoginController::class,'logout']);


Route::get('/question_editor', [QuestionEditorController::class,'index']);

Route::get('/register', [RegistrationController::class,'create']);
Route::post('/register', [RegistrationController::class,'store'])->name('register.store');
