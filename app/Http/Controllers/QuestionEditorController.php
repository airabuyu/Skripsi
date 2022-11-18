<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionEditorController extends Controller
{
    //
    public function index(){

        return view('question_editor');
    }
}
