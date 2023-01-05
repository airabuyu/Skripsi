<?php

use App\Http\Controllers\CreateExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionEditorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExamListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageFileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [LoginController::class,'index'])->middleware('guest');
Route::get('/login', [LoginController::class,'index'])->middleware('guest');
Route::post('/login', [LoginController::class,'login'])->middleware('guest');
Route::get('/logout', [LoginController::class,'logout']);
Route::post('/logout', [LoginController::class,'logout']);


Route::post('/view_questions', [QuestionEditorController::class,'viewQuestion'])->middleware('auth');
Route::get('/question_viewer/{exam}', [QuestionEditorController::class,'questionViewer'])->middleware('auth');
Route::post('/submit_answers', [QuestionEditorController::class,'submitAnswers'])->middleware('auth');

Route::get('/question_editor', [QuestionEditorController::class,'index'])->name('question_editor_view')->middleware('admin');
Route::post('/question_generator/{exam}', [QuestionEditorController::class,'createQuestion'])->middleware('admin');
Route::post('/question_duplicate/{exam}', [QuestionEditorController::class,'duplicateQuestion'])->middleware('admin');

Route::get('/create_exam', [CreateExamController::class,'index'])->middleware('admin');
Route::post('/question_editor', [CreateExamController::class,'createExam'])->middleware('admin');


Route::get('/register', [RegistrationController::class,'create'])->middleware('admin');
Route::post('/register', [RegistrationController::class,'store'])->middleware('admin');


Route::get('/exam_list', [ExamListController::class,'index'])->middleware('admin');
Route::get('/delete_exam/{exam}', [ExamListController::class,'destroy'])->middleware('admin');
Route::get('/edit_exam/{exam}', [ExamListController::class,'editExam'])->middleware('admin');
Route::post('/exam_editor', [ExamListController::class,'updateExam'])->middleware('admin');


Route::get('/manage_file', [ManageFileController::class,'index'])->middleware('auth');
Route::post('/create_folder', [ManageFileController::class,'createFolder'])->middleware('admin');
Route::post('/create_file', [ManageFileController::class,'createFile'])->middleware('admin');
Route::delete('/delete_file', [ManageFileController::class,'deleteFile'])->middleware('admin');
Route::delete('/delete_folder', [ManageFileController::class,'deleteFolder'])->middleware('admin');
Route::post('/download_file', [ManageFileController::class,'downloadFile'])->middleware('auth');
Route::get('/folder_click/{path}', [ManageFileController::class,'folderClick'])->where('path', '.*')->middleware('auth');
Route::get('/folder_back/{path}', [ManageFileController::class,'folderBack'])->where('path', '.*')->middleware('auth');


Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');

Route::get('/homeregister',[UserController::class,'usershowsearch'])->middleware('auth');
Route::get('/userdetail/{userid}',[UserController::class,'userdetail'])->middleware('auth');
Route::post('/userdetail/update/{id}',[UserController::class,'updateUser'])->middleware('admin');
Route::get('/resetpassword/{userid}',[UserController::class,'resetPassword'])->middleware('auth');
Route::get('/changepassword', [UserController::class,'viewchangepassword'])->middleware('auth');
Route::post('/changepassword', [UserController::class,'storepassword'])->middleware('auth');
Route::get('/changeprofile',[UserController::class,'getDataUser'])->middleware('auth');
Route::post('/changeprofile',[UserController::class,'upload'])->middleware('auth');

Route::get('/report', [ReportController::class,'index'])->middleware('auth');
Route::get('/report_export', [ReportController::class,'userExport'])->middleware('auth');

