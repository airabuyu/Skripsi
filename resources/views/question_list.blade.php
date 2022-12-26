@extends('layouts.menu')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $exam->exam_name }}</div>
                    <form method="POST" action="">
                        @csrf

                            @foreach($exam->questions as $question )

                            <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">{{ $question->question_name }}</div>


                                            <div class="card-body">
                                                    @foreach($question->questionAnswers as $answer)

                                                        @if ($question->question_type_id == 1)
                                                        <div class="form-check">
                                                            <input
                                                                @if($answer->is_answer)
                                                                checked
                                                                @endif
                                                            class="form-check-input" type="checkbox" name="questiod">
                                                            <label class="form-check-label" for="option-">
                                                                    {{ $answer->question_answer_name }}
                                                        </label>
                                                        </div>



                                                        @elseif ($question->question_type_id == 2)

                                                        <div class="form-check">
                                                            <input
                                                                @if($answer->is_answer)
                                                                checked
                                                                @endif
                                                            class="form-check-input" type="radio" name="questiod">
                                                            <label class="form-check-label" for="option-">
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
