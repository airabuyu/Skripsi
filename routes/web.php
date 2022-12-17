<?php

use App\Http\Controllers\CreateExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionEditorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExamListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageFileController;
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
Route::get('/testview', [LoginController::class,'testview']);


Route::get('/question_editor', [QuestionEditorController::class,'index'])->name('question_editor_view');;
Route::post('/question_generator/{exam}', [QuestionEditorController::class,'createQuestion']);

Route::get('/create_exam', [CreateExamController::class,'index']);
Route::post('/question_editor', [CreateExamController::class,'createExam']);


Route::get('/register', [RegistrationController::class,'create']);
Route::post('/register', [RegistrationController::class,'store']);


Route::get('/exam_list', [ExamListController::class,'index']);
Route::get('/delete_exam/{exam}', [ExamListController::class,'destroy']);

Route::get('/manage_file', [ManageFileController::class,'index']);
Route::post('/create_folder', [ManageFileController::class,'createFolder']);
Route::post('/create_file', [ManageFileController::class,'createFile']);
Route::delete('/delete_file', [ManageFileController::class,'deleteFile']);
Route::delete('/delete_folder', [ManageFileController::class,'deleteFolder']);
Route::post('/download_file', [ManageFileController::class,'downloadFile']);
Route::get('/folder_click/{path}', [ManageFileController::class,'folderClick'])->where('path', '.*');;
Route::get('/folder_back/{path}', [ManageFileController::class,'folderBack'])->where('path', '.*');;






Route::get('/homeregister',[UserController::class,'usershowsearch']);
Route::get('/userdetail/{userid}',[UserController::class,'userdetail']);
Route::post('/userdetail/update/{id}',[UserController::class,'updateUser']);
Route::get('/resetpassword/{userid}',[UserController::class,'resetPassword']);
