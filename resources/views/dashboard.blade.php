@extends('layouts.menu')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

<div class="container mt-5">
    <h2>Upcoming Exams in this Month</h2>

    <!-- Create a table to display the exam list -->
    <table class="table table-striped table-hover mb-0">
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
        <?php
        $i = 0;
        ?>

        @foreach ($exams as $exam)
        @if ( ($exam->examResults->first() == null && $exam->participants->first() == null)
            || ($exam->examResults->first() == null && $exam->participants->first() != null)
            || ($exam->examResults->first() != null && $exam->participants->first() == null)
        )
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
                <td><button class="btn btn-primary" id="button{{ $i }}"
                    {{-- @if ($exam->exam_start_dt > date('Y-m-d H:i:s'))
                    disabled
                    @endif --}}

                     type="submit">Join Exam</button></td>
            </form>
        </tr>
        @endif


        <?php
        $i ++;
        ?>
        @endforeach
      </tbody>
    </table>
  </div>


  <script>
    @if($message = session('success'))
      Swal.fire({
          title: 'Thank you for Paticipate :)',
          type: 'success',
          showCloseButton: true
      })
    @endif
    const exams = {!! json_encode($exams) !!}

    // console.log(exams.length);


    // console.log(exams[0]);

    for(let i=0; i<exams.length; i++){
        // const startDate = new Date("2022-12-30 00:12:40");
        const startDate = new Date(exams[i].exam_start_dt);

        const currentDate = new Date();

        if (currentDate < startDate) {
        $('#button' + i).prop('hidden', true);
        } else {
        $('#button' + i).prop('hidden', false);
        }

        setInterval(function() {
        const currentDate = new Date();

        if (currentDate > startDate) {
        $('#button' + i).prop('hidden', false);
        }
        }, 1000);

    }


  </script>

@endsection
