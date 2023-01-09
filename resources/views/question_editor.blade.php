@extends('layouts.menu')
@section('content')


<form action="/question_generator/{{ $exam->id }}" method="post" enctype="multipart/form-data" class="row col-10 my-form border" style="padding: 20px; margin-left:auto; margin-right:auto;" >
    @csrf

    <input type="hidden" class="total_question" name= "total_question" value="0">

    <h4 class="fw-bold text-center mt-3">{{ $exam->exam_name }}</h4>

    <button type="submit" class="btn btn-primary" style="margin-left: auto;">
        Create Questions
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
    </button>

    <div class="px-4 question-group d-none mt-5 border"  style="width: 100%;">

        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>


        <div class="number mt-4"></div>
        <div class="form-group">
            <textarea class="form-control" name="question_name[]"  id="testArea" rows="3"></textarea>
        </div>


        <div class="fw-bold text-center mb-3">
            <span class="cb">
                <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                </a>
            </span>

            <span class="rb">
                <a href="javascript:void(0);" class="add_button2 btn btn-warning" title="Add field">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-radios" viewBox="0 0 16 16">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg>
                </a>
            </span>
        </div>

        <div class="checkbox-radio-container">

        </div>
    </div>
</form>




<div class="row col-10 checkbox-list" style="padding: 20px; margin-left:auto; margin-right:auto;"  >
  <div style=" margin-left:auto; margin-right:auto;">
    <a href="javascript:void(0);" class="add_div btn btn-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>


   </div>
</div>







<script type="text/javascript">
    @if($message = session('success'))
      Swal.fire({
          title: 'Success Create Exam',
          type: 'success',
          showCloseButton: true
      })
    @elseif($message = session('failquestion'))
      Swal.fire({
          title: 'Question Cannot be empty',
          type: 'warning',
          showCloseButton: true
      })
    @elseif($message = session('failquestionans'))
      Swal.fire({
          title: 'Question Answer Cannot be empty',
          type: 'warning',
          showCloseButton: true
      })
    @endif
    const constants = {
        TYPE_CHECK_BOX: 1,
        TYPE_RADIO_BUTTON: 2,
    };

    const max = {
        checkBox: 10,
        radioButton: 10,
    }

    const removeButtonHtml = `<div class="input-group-append">
        <a href="javascript:void(0);" class="remove_button btn btn-danger">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>`;

    let totalQuestions = 0;

    $(document).ready(function () {
        const addQuestionGroupButton = $('.add_div');
        addQuestionGroupButton.click(addQuestionGroup);
        addQuestionGroup(); // Show first group on load
    });


    const addQuestionGroup = () => {
        const newQuestionGroup = $('.question-group').first().clone();
        const myForm = $('.my-form');

        let curr = myForm.find('.question-group').length;
        let number = myForm.find('.number');

        const divs = document.getElementsByClassName('question-group');

        totalQuestions = $('.my-form').children('.question-group').children('.close').length;

        $('.my-form').append(newQuestionGroup);

        divs[curr].querySelector('.number').innerText = curr;

        newQuestionGroup.removeClass('d-none');


        newQuestionGroup.find('.add_button').click(function(){
            addCheckBox(newQuestionGroup);
        });
        newQuestionGroup.find('.add_button2').click(function(){
            addRadioButton(newQuestionGroup);
        });
        newQuestionGroup.find('.close').click(function() {
            deleteQuestion(newQuestionGroup);
        });

        document.getElementsByClassName('total_question')[0].setAttribute('value', totalQuestions);
    };

    const clearCurrentForm = (currentQuestionGroup, clearedInputType) => {
        if (clearedInputType == constants.TYPE_CHECK_BOX) {
            currentQuestionGroup.find('.my-check-box-group').remove();
        } else if (clearedInputType == constants.TYPE_RADIO_BUTTON) {
            currentQuestionGroup.find('.my-radio-button-group').remove();
        }
    };

    const addCheckBox = (currentQuestionGroup) => {
        let currIndex = parseInt(currentQuestionGroup.children('.number').text());

        clearCurrentForm(currentQuestionGroup, constants.TYPE_RADIO_BUTTON);
        var fieldHTML = $(`<div class="input-group mb-3 my-check-box-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="hidden" name="question_type${currIndex}" value="checkbox" />
                        <input class="choose_input" type="hidden" name="options${currIndex}[]" value="0">
                        <input  class="choose_input" name="options${currIndex}[]" value="1" type="checkbox" aria-label="Checkbox for following text input">
                    </div>
                </div>
                <input  name="names${currIndex}[]" type="text" class="form-control text_input" aria-label="Text input with checkbox">
                ${removeButtonHtml}
            </div>`);

        fieldHTML.find('.remove_button').click(function() {
            fieldHTML.remove();
        });


        const count = currentQuestionGroup.children('.checkbox-radio-container').children('.my-check-box-group').length;
        if (count < max.checkBox) {
            currentQuestionGroup.children('.checkbox-radio-container').append(fieldHTML);
        }
    };

    const addRadioButton = (currentQuestionGroup) => {
        let currIndex = parseInt(currentQuestionGroup.children('.number').text());

        clearCurrentForm(currentQuestionGroup, constants.TYPE_CHECK_BOX);
        const fieldHTML = $(`<div class="input-group mb-3 my-radio-button-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="hidden" name="question_type${currIndex}" value="radio" />
                        <input class="choose_input" type="hidden" name="options${currIndex}[]" value="0" />
                        <input   class="choose_input"  name="options${currIndex}[]" value="1" type="radio" aria-label="Radio button for following text input" />
                    </div>
                </div>
                <input  name="names${currIndex}[]" type="text" class="form-control text_input" aria-label="Text input with radio button" />
                ${removeButtonHtml}
            </div>
        </div>`);

        fieldHTML.find('.remove_button').click(function() {
            fieldHTML.remove();
        });

        const count = currentQuestionGroup.children('.checkbox-radio-container').children('.my-radio-button-group').length;
        if (count < max.radioButton) {
            currentQuestionGroup.children('.checkbox-radio-container').append(fieldHTML);
        }
    };

    const deleteQuestion =  (currentQuestionGroup) => {

        let currIndex = parseInt(currentQuestionGroup.children('.number').text());

        if(currIndex != 1){
            for(let i=currIndex+1; i<=totalQuestions;i++){
                let divs = document.getElementsByClassName('question-group');
                let numberValue = divs[i].getElementsByClassName('number')[0].innerText;
                let nameForChooseInput = `options${numberValue-1}[]`;
                let nameForTextInput = `names${numberValue-1}[]`;

                divs[i].getElementsByClassName('number')[0].innerText = divs[i].getElementsByClassName('number')[0].innerText -1;

                if(divs[i].getElementsByClassName('input-group-prepend').length != 0){
                    for(let j=0; j<divs[i].getElementsByClassName('input-group-prepend').length; j++){

                        divs[i].getElementsByClassName('choose_input')[j].setAttribute("name", nameForChooseInput);
                        divs[i].getElementsByClassName('text_input')[j].setAttribute("name", nameForTextInput);
                    }
                }

            }
        }

        if(totalQuestions > 1 && currIndex != 1) {
            currentQuestionGroup.remove();
            totalQuestions--;
            document.getElementsByClassName('total_question')[0].setAttribute('value', totalQuestions);
        }
    };

</script>
@endsection
