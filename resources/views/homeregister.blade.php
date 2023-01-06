@extends('layouts.menu')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>


<div class="container mb-5">
    <div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2">
            <form>
                <div class="input-group mb-2">
                    <div class="input-group mb-3 d-flex justify-content-center">
                        <a class="btn btn-primary form-control margin-left col-md-3" href="/register">Register new User</a>    
                        <label for="search" class="col-md-1 col-form-label text-md-end align-self-center">{{ __('Search:') }}</label>
                        <input type="text" class="form-control margin-left col-md-5" placeholder="" name="search" >
                        <button class="btn btn-primary margin-right" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   
    <table class="table table-striped table-hover mb-0">
        <thead class="">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Department</th>
            <th scope="col">Status</th>
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
            <td>{{ $user->department }}</td>
            <td>{{ $user->status }}</td>
            <td>
                <a href="/userdetail/{{$user->id}}"  class="edit" title="Edit User" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg></a>          
                <a href="/resetpassword/{{$user->id}}" onclick="confirmation(event)" class="edit" title="Reset Password User" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 24 24">
                <path d="M17 2.1l4 4-4 4"/><path d="M3 12.2v-2a4 4 0 0 1 4-4h12.8M7 21.9l-4-4 4-4"/><path d="M21 11.8v2a4 4 0 0 1-4 4H4.2"/>
                </svg></a>  
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
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    // console.log(urlToRedirect); // verify if this is the right URL
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure want to Reset?',
        text: '',
        showCancelButton: true,
        type : 'warning',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reset!'
    }).then((result) => {
        if (result.value) {
            window.location.href=urlToRedirect;
        }
    })
}

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
