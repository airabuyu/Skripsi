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
                    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" class="form-control " name="email" id="email" required
                                value="{{ old('email') }}" placeholder="Email Address">
                            <label for="email"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top" name="user_name" id="user_name" required
                                value="{{ old('user_name') }}" placeholder="Username">
                            <label for="user_name"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top" name="name" id="name" required
                                value="{{ old('name') }}" placeholder="Name">
                            <label for="name"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top" name="department" id="department" required
                                value="{{ old('department') }}" placeholder="Department">
                            <label for="department"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top" name="status" id="status" required
                                value="{{ old('status') }}" placeholder="status">
                            <label for="status"></label>
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control rounded-top" name="phone_number" id="phone_number" required
                                value="{{ old('phone_number') }}" placeholder="Phone Number">
                            <label for="name"></label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-bottom" name="password" id="password" required
                                placeholder="Password">
                            <label for="password"></label>
                        </div>
                        <div class="form-floating">
                            <label>Role </label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">
                                        {{$role->role_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div style="display:none" class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label">Is Active</label>
                        </div>
                        <div class="form-floating">
                            <label class="form-check-label">Date of Birth</label>
                            <input type="date" id="date_of_birth" required name="date_of_birth" class="form-control">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                        <a href="/homeregister"  class="w-100 btn btn-lg btn-danger mt-3" title="Cancel">Cancel</a>
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
          title: 'Something Wrong',
          type: 'error',
          showCloseButton: true
      }) 
    @endif
</script>
@endsection
