@extends('layouts.menu')
@section('content')


<div class="row col-5">
    <h4 class="fw-bold text-center mt-3"></h4>
    <form class="px-4" action="">
      <p class="fw-bold">Choose one or more options</p>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
        <label class="form-check-label" for="flexCheckDefault">
          Option 1
        </label>
      </div>
  
      <!-- Checked checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />
        <label class="form-check-label" for="flexCheckDefault2">
          Option 2
        </label>
      </div>
  
      <!-- Checked checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" />
        <label class="form-check-label" for="flexCheckDefault3">
          Option 3
        </label>
      </div>
    </form>
    <div class="card-footer text-end">
      <button type="button" class="btn btn-primary">Submit</button>
    </div>
  </div>

@endsection
