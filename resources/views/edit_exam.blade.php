@extends('layouts.menu')
@section('content')




<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <main class="form-registration">
                    <h1 class="h3 mb-3 fw-normal text-center">Edit Exam</h1>
                    <form action="/exam_editor" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating">
                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                            <input type="exam_name" class="form-control " name="exam_name" id="exam_name" required
                               placeholder="Exam Name" value="{{ $exam->exam_name }}">
                            <label for="exam_name"></label>
                        </div>
                        <div class="form-floating">
                            <input type="module_name" class="form-control " name="module_name" id="module_name" required
                               placeholder="Module Name"  value="{{ $exam->module_name }}">
                            <label for="module_name"></label>
                        </div>
                        <div class="form-floating">
                            <label class="form-check-label">Exam Start</label>
                            <input type="datetime-local" id="startdt" name="startdt" class="form-control" value="{{ $start }}">
                        </div>
                        <div class="form-floating">
                            <label class="form-check-label">Exam Close</label>
                            <input type="datetime-local" id="enddt" name="enddt" class="form-control" value="{{ $end }}">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
                    </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
