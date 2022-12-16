@extends('layouts.menu')
@section('content')
<head>
</head>

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
    <a class="btn btn-primary" href="/register">Register new User</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">User Detail<th>
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

@endsection
