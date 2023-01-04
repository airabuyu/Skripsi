@extends('layouts.menu')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

<div class="row justify-content-center">
        <div class="col-md-10 mt-2">
            <form>
                <div class="input-group mb-2">
                    <div class="input-group mb-3 d-flex justify-content-center">
                        <label for="search" class="col-md-1 col-form-label text-md-end align-self-center">{{ __('Search:') }}</label>
                        <input type="text" class="form-control margin-left col-md-5" placeholder="" name="search" >
                        <button class="btn btn-primary margin-left" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
</div>
<div class="container mb-5">
    <div class="container mb-5">
    <a class="btn btn-primary mb-4" href="/register">Register new User</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($users as $user)
            <?php $i++; ?>
        <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->user_name }}</td>
            <td>
                <a class="btn btn-primary" href="/userdetail/{{$user->id}}">Edit</a>
                <a class="btn btn-primary" href="/resetpassword/{{$user->id}}">Reset</a>
            </td>
        </tr>
            @endforeach
    </tbody>
    </table>
</div>

<div class="d-flex align-items-center justify-content-center mb-5">
    {{$users->links()}}
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
          title: 'Something Wrong',
          type: 'error',
          showCloseButton: true
      })
    @endif
</script>
@endsection
