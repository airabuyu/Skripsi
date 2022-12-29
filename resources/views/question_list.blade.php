@extends('layouts.menu')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $exam->exam_name }}</div>
                    <form method="POST" action="/submit_answers" enctype="multipart/form-data">
                        @csrf
                            <?php
                                $i = 1;
                            ?>
                            @foreach($exam->questions as $question )



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
                                            <button type="submit" class="btn btn-primary">
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


@endsection
