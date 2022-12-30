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

Route::get('/', [LoginController::class,'index']);
Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout']);
Route::post('/logout', [LoginController::class,'logout']);
Route::get('/testview', [LoginController::class,'testview']);


Route::post('/view_questions', [QuestionEditorController::class,'viewQuestion']);
Route::get('/question_viewer/{exam}', [QuestionEditorController::class,'questionViewer']);
Route::post('/submit_answers', [QuestionEditorController::class,'submitAnswers']);

Route::get('/question_editor', [QuestionEditorController::class,'index'])->name('question_editor_view');;
Route::post('/question_generator/{exam}', [QuestionEditorController::class,'createQuestion']);
Route::post('/question_duplicate/{exam}', [QuestionEditorController::class,'duplicateQuestion']);

Route::get('/create_exam', [CreateExamController::class,'index']);
Route::post('/question_editor', [CreateExamController::class,'createExam']);


Route::get('/register', [RegistrationController::class,'create']);
Route::post('/register', [RegistrationController::class,'store']);


Route::get('/exam_list', [ExamListController::class,'index']);
Route::get('/delete_exam/{exam}', [ExamListController::class,'destroy']);
Route::get('/edit_exam/{exam}', [ExamListController::class,'editExam']);
Route::post('/exam_editor', [ExamListController::class,'updateExam']);


Route::get('/manage_file', [ManageFileController::class,'index']);
Route::post('/create_folder', [ManageFileController::class,'createFolder']);
Route::post('/create_file', [ManageFileController::class,'createFile']);
Route::delete('/delete_file', [ManageFileController::class,'deleteFile']);
Route::delete('/delete_folder', [ManageFileController::class,'deleteFolder']);
Route::post('/download_file', [ManageFileController::class,'downloadFile']);
Route::get('/folder_click/{path}', [ManageFileController::class,'folderClick'])->where('path', '.*');;
Route::get('/folder_back/{path}', [ManageFileController::class,'folderBack'])->where('path', '.*');;


Route::get('/dashboard', [DashboardController::class,'index']);

Route::get('/homeregister',[UserController::class,'usershowsearch']);
Route::get('/userdetail/{userid}',[UserController::class,'userdetail']);
Route::post('/userdetail/update/{id}',[UserController::class,'updateUser']);
Route::get('/resetpassword/{userid}',[UserController::class,'resetPassword']);
Route::get('/changepassword', [UserController::class,'viewchangepassword']);
Route::post('/changepassword', [UserController::class,'storepassword']);
Route::get('/changeprofile',[UserController::class,'getDataUser']);
Route::post('/changeprofile',[UserController::class,'upload']);

Route::get('/report', [ReportController::class,'index']);
Route::get('/report_export', [ReportController::class,'userExport']);

