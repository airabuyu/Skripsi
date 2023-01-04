@extends('layouts.menu')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>



<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <main class="form-registration">
                    <h1 class="h3 mb-3 fw-normal text-center">Create Exam</h1>
                    <form action="/question_editor" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating">
                            <input type="exam_name" class="form-control " name="exam_name" id="exam_name" required
                               placeholder="Exam Name">
                            <label for="exam_name"></label>
                        </div>
                        <div class="form-floating">
                            <input type="module_name" class="form-control " name="module_name" id="module_name" required
                               placeholder="Module Name">
                            <label for="module_name"></label>
                        </div>
                        <div class="form-floating">
                            <label class="form-check-label">Exam Start</label>
                            <input type="datetime-local" id="startdt" name="startdt" class="form-control">
                        </div>
                        <div class="form-floating">
                            <label class="form-check-label">Exam Close</label>
                            <input type="datetime-local" id="enddt" name="enddt" class="form-control">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Next</button>
                        <a class="w-100 btn btn-lg btn-danger mt-3" href="/exam_list">Cancel</a>
                    </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    @if($message = session('failday'))
      Swal.fire({
          title: 'Wrong Input Date',
          type: 'error',
          showCloseButton: true
      })
    @elseif($message = session('fail'))
      Swal.fire({
          title: 'Characters cannot more than 200',
          type: 'error',
          showCloseButton: true
      })
    @endif
</script>




@endsection
