@extends('layouts.menu')
@section('content')
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
                            <label for="email" >Email</label>
                            <input id="email" type="email" class="form-control form-control-lg" placeholder="email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
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
@endsection
