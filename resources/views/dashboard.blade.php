@extends('layouts.menu')
@section('content')



<div class="container mt-5">
    <h2>Upcoming Exams in this Month</h2>

    <!-- Create a table to display the exam list -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Exam Name</th>
          <th>Date</th>
          <th>Start Date</th>
          <th>Close Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($exams as $exam)
        <tr>
            <form action="/view_questions"  method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="exam_id" value="{{$exam->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <td>{{ $exam->exam_name }}</td>
                {{-- <td>{{ date_create_from_format("m-d-Y", $exam->exam_start_dt)->format("Y-m-d") }}</td> --}}
                <td>{{ date('d F Y', strtotime($exam->exam_start_dt))}} </td>
                <td>{{ date('H:i', strtotime($exam->exam_start_dt))}} </td>
                <td>{{ date('H:i', strtotime($exam->exam_close_dt))}} </td>
                {{-- <td>{{ date_format($exam->exam_start_dt,"Y/m/d H:i:s") }} </td> --}}
                {{-- <td>{{ $exam->exam_start_dt->format('Y-m-d H:i:s') }}</td> --}}
                <td><button class="btn btn-primary" type="submit">Join Exam</button></td>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
