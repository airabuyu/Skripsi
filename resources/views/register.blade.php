@extends('layouts.menu')
@section('content')
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
                            <input type="text" class="form-control rounded-top" name="phone_number" id="phone_number" required
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
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                    </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
