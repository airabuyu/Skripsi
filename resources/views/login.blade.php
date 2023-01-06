@extends('layouts.menu')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

    <div class="container py-5 ">
        <div class="text-center">
        <h1 class="mt-5">Welcome to AdIns Training</h1>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
                <div class="col-10 col-xl-5">
                <form action="/login" method="post">
                    @csrf
                    <div class="card p-4 bg-white rounded">
                        <div class="card-body p-4 ">
                            {{-- <h3 class=" d-flex justify-content-start mb-4">Login</h3> --}}
                            <label for="user_name" >Username</label>
                            <input id="user_name"  class="form-control form-control-lg" placeholder="username" name="user_name">
                            @if ($errors->has('user_name'))
                                <span class="text-danger">{{ $errors->first('user_name') }}</span>
                            @endif
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control form-control-lg" placeholder="password"
                                name="password" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                            <button class="btn btn-primary btn-lg btn-block align-items-center mt-4" type="submit">Login</button>

                        </div>
                    </div>
                </form>
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
          title: 'Wrong Input',
          type: 'error',
          showCloseButton: true
      })
    @endif
</script>
@endsection
