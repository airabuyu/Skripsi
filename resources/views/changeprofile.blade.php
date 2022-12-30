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
                    <h1 class="h3 mb-3 fw-normal text-center">Change Profile</h1>
                    <form action="/changeprofile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                        <a href="/dashboard"  class="w-100 btn btn-lg btn-danger mt-3" title="Cancel">Cancel</a>
                    </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    @if($message = session('success'))
      Swal.fire({
          title: 'Success',
          type: 'success',
          showCloseButton: true
      })
    @elseif($message = session('fail'))
      Swal.fire({
          title: 'There is no File here',
          type: 'error',
          showCloseButton: true
      }) 
    @endif
</script>
@endsection