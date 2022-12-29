@extends('layouts.menu')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $exam->exam_name }}

                <div style="float: right;">
                    <?php
                        echo '<div id="timer">';
                        echo '<span id="hours">00</span> : ';
                        echo '<span id="minutes">00</span> : ';
                        echo '<span id="seconds">00</span> ';
                        echo '</div>';
                    ?>

                </div>
                </div>
                    <form method="POST" action="/submit_answers" enctype="multipart/form-data">
                        @csrf
                            <?php
                                $i = 1;
                            ?>
                            @foreach($exam->questions as $question )

                            <input  type="hidden" name="exam_id" value="{{ $exam->id }}">

                            <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">{{$i . ". " . $question->question_name }}</div>
                                            <?php
                                                $i++;
                                            ?>
                                             <input type="hidden" name="questions[]" value="{{ $question->id }}">

                                            <div class="card-body">
                                                    @foreach($question->questionAnswers as $answer)

                                                        @if ($question->question_type_id == 1)
                                                        <div class="form-check">
                                                            <input class="choose_input"  type="hidden" name="options{{ $question->id }}[]" value="0">

                                                            <input
                                                            class="form-check-input" id="option-c{{$answer->id}}" value="1" type="checkbox" name="options{{ $question->id }}[]">
                                                            <label class="form-check-label" for="option-c{{$answer->id}}">
                                                                    {{ $answer->question_answer_name }}
                                                        </label>
                                                        </div>



                                                        @elseif ($question->question_type_id == 2)

                                                        <div class="form-check">
                                                            <input class="choose_input"  type="hidden" name="options{{ $question->id }}[]" value="0">

                                                            <input
                                                            class="form-check-input" id="option-r{{$answer->id}}}" type="radio" name="options{{ $question->id }}[]" value="1">
                                                            <label class="form-check-label" for="option-r{{$answer->id}}}">
                                                                {{ $answer->question_answer_name }}

                                                        </label>

                                                        </div>

                                                        @endif

                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6">
                                            <button type="submit" id="button" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    echo '<script>';
    echo 'var seconds = ' . intval(strtotime($exam->exam_close_dt) - time()) . ';';
    echo 'var timer = setInterval(function() {';
    echo '  var days        = Math.floor(seconds/24/60/60);';
    echo '  var hoursLeft   = Math.floor((seconds) - (days*86400));';
    echo '  var hours       = Math.floor(hoursLeft/3600);';
    echo '  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));';
    echo '  var minutes     = Math.floor(minutesLeft/60);';
    echo '  var remainingSeconds = seconds % 60;';
    echo '  if (remainingSeconds < 10) {';
    echo '    remainingSeconds = "0" + remainingSeconds;';
    echo '  }';
    echo '  document.getElementById("hours").innerHTML = ("0" + hours).slice(-2) ;';
    echo '  document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2) ;';
    echo '  document.getElementById("seconds").innerHTML = remainingSeconds;';
    echo '  if (seconds == 0) {';
    echo '    clearInterval(timer);';
    echo '    document.getElementById("button").click();';
    echo '  }';
    echo '  seconds--;';
    echo '}, 1000);';
    echo '</script>';

?>


@endsection
