@extends('layouts.menu')
@section('content')






<form action="/question_editor" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-outline form-white mb-4">

        <label class="form-label" for="name">Exam Name</label>
        <input type="text" name="exam_name" class="form-control form-control-lg" />

        <label class="form-label" for="name">Module Name</label>
        <input type="text" name="module_name" class="form-control form-control-lg" />

        <label class="form-label" for="name">Start Date</label>
        <input type="datetime-local" id="startdt" name="startdt">

        <label class="form-label" for="name">End Dt</label>
        <input type="datetime-local" id="enddt" name="enddt">

       
    </div>

    <br>

    <button class="btn btn-lg px-5" type="submit">Add</button>

    
</form>











@endsection
