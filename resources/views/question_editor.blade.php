@extends('layouts.menu')
@section('content')


<div class="row col-10" style="background-color: rgb(242, 226, 149); padding: 20px; margin-left:auto; margin-right:auto;" >
    <h4 class="fw-bold text-center mt-3"></h4>
    <form class="px-4 field_wrapper" action="/question_generator/{{ $exam->id }}" method="post" enctype="multipart/form-data" style="width: 100%;">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="question_name"  id="testArea" rows="3"></textarea>
        </div>


        <span class="cb">
            <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">
                CheckBox
            </a>
         </span>

         <span class="rb">
            <a href="javascript:void(0);" class="add_button2 btn btn-warning" title="Add field">
                Radio Button
            </a>
        </span>
        <button class="btn btn-lg px-5" type="submit">Add</button>

    </form>
  </div>

  <div class="new_wrapper">

  </div>


<div class="row col-10 checkbox-list" style="padding: 20px; margin-left:auto; margin-right:auto;" >
  <div style=" margin-left:auto; margin-right:auto;">
    <a href="javascript:void(0);" class="add_div btn btn-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>
   </div>
</div>







<script type="text/javascript">



        $(document).ready(function () {



        var addButton = $('.add_button');
        var addButton2 = $('.add_button2');

        var maxFieldX = 8;
        var maxFieldY = 8;
        var x = 1;
        var y = 1;

        var anotherDiv = $('.add_div');

        var fieldDiv =
            '<div class="row col-10" style="background-color: rgb(242, 226, 149); padding: 20px; margin-left:auto; margin-right:auto;" >    <h4 class="fw-bold text-center mt-3"></h4>    <form class="px-4 field_wrapper" action="" style="width: 100%;">        <div class="form-group">            <textarea class="form-control"  id="testArea" rows="3"></textarea>        </div>               <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">            CheckBox        </a>        <a href="javascript:void(0);" class="add_button2 btn btn-warning" title="Add field">            Radio Button        </a>    </form>  </div>';


        var wrapper = $('.field_wrapper');
        var new_wrapper = $('.new_wrapper');

        var fieldHTML =
            '<div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><input type="hidden" name="options[]" value="0"><input class="checkbox-list" name="options[]" value="1" type="checkbox" aria-label="Checkbox for following text input"></div></div><input name="names[]" type="text" class="form-control" aria-label="Text input with checkbox"><div class="input-group-append"><a href="javascript:void(0);" class="remove_button btn btn-danger"><span aria-hidden="true">&times;</span></a></div></div></div>';


        var fieldHTML2 =
            '<div class="input-group mb-3"><div class="input-group-prepend"><div class="input-group-text"><input type="hidden" name="options[]" value="0"><input  class="radio-list"  name="options[]" value="1" type="radio" aria-label="Radio button for following text input"></div></div><input name="names[]" type="text" class="form-control" aria-label="Text input with radio button"><div class="input-group-append"><a href="javascript:void(0);" class="remove_button2 btn btn-danger"><span aria-hidden="true">&times;</span></a></div></div></div>';



        $('input[type="checkbox"]').on('change', function() {
            $('input[type="checkbox"]').not(this).prop('checked', false);
        });

        $(addButton).click(function () {
            if (x < maxFieldX) {
                x++
                $(wrapper).append(fieldHTML);
                $('.rb').hide();
            }
        });

        $(addButton2).click(function () {
            if (y < maxFieldY) {
                y++;
                $(wrapper).append(fieldHTML2);
                $('.cb').hide();
            }
        });


        $(anotherDiv).click(function () {
            $(new_wrapper).append(fieldDiv);
        });

        $(new_wrapper).on('click', '.add_button', function (e) {
            $(wrapper).append(fieldHTML);
        });

        // $(new_wrapper).on('click', '.add_button2', function (e) {
        //     $(wrapper).append(fieldHTML2);
        // });

        $(wrapper).on('click', '.remove_button', function (e) {
            x--;
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            if(x==1){
                $('.rb').show();
            }
        });

        $(wrapper).on('click', '.remove_button2', function (e) {
            y--;
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            if(y==1){
                $('.cb').show();
            }
        });


    });


</script>
@endsection
