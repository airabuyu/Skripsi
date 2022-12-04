@extends('layouts.menu')
@section('content')


<div class="row col-10" style="background-color: rgb(242, 226, 149); padding: 20px; margin-left:auto; margin-right:auto;" >
    <h4 class="fw-bold text-center mt-3"></h4>
    <form class="px-4 field_wrapper" action="">
      <p class="fw-bold">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus enim, doloribus error facilis mollitia nobis eligendi provident blanditiis nesciunt, sunt rem quisquam quos aliquam officia corporis reprehenderit, beatae iure consequatur!
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe maiores et molestiae minima obcaecati possimus placeat nam non magnam consequuntur temporibus cumque, enim commodi voluptatum eveniet? Consequuntur numquam quisquam necessitatibus.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas sed voluptas explicabo beatae minus incidunt quibusdam quos vitae ut sapiente? Neque explicabo iusto aperiam omnis aspernatur id natus. Illum, ex? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo quasi doloremque impedit blanditiis, aperiam fuga harum ex quisquam qui nostrum laborum vel odio, sint eum sapiente adipisci quidem veritatis temporibus.</p>
        1 + 1 = ?

        <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
        </a>

        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
        <label class="form-check-label" for="flexCheckDefault">
          Option 1
        </label>
      </div>
  
      <!-- Checked checkbox -->
      <div class="form-check" style="background-color: rgb(242, 226, 149); padding: 20px">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />
        <label class="form-check-label" for="flexCheckDefault2">
          Option 2
        </label>
      </div>
  
      <!-- Checked checkbox -->
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" />
        <label class="form-check-label" for="flexCheckDefault3">
          Option 3
        </label>
      </div>
    </form>
  </div>



  <div class="row col-10" style="background-color: rgb(242, 226, 149); padding: 20px; margin-left:auto; margin-right:auto;" >
    <h4 class="fw-bold text-center mt-3"></h4>
    <form class="px-4" action="">
      <p class="fw-bold">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus enim, doloribus error facilis mollitia nobis eligendi provident blanditiis nesciunt, sunt rem quisquam quos aliquam officia corporis reprehenderit, beatae iure consequatur!
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe maiores et molestiae minima obcaecati possimus placeat nam non magnam consequuntur temporibus cumque, enim commodi voluptatum eveniet? Consequuntur numquam quisquam necessitatibus.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas sed voluptas explicabo beatae minus incidunt quibusdam quos vitae ut sapiente? Neque explicabo iusto aperiam omnis aspernatur id natus. Illum, ex? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo quasi doloremque impedit blanditiis, aperiam fuga harum ex quisquam qui nostrum laborum vel odio, sint eum sapiente adipisci quidem veritatis temporibus.</p>
        1 + 1 = ?
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
        <label class="form-check-label" for="flexCheckDefault">
          Option 1
        </label>
      </div>
  
      <!-- Checked checkbox -->
      <div class="form-check" style="background-color: rgb(242, 226, 149); padding: 20px">
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
  </div>












<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 20;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML =
        // '<div class="form-check " style="background-color: rgb(242, 226, 149); padding: 20px"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" />'' <label class="form-check-label" for="flexCheckDefault2"> Option 2 </label> </div>'
            // '<div class="row align-items-center justify-content-center mt-5"> <button class="btn btn-primary" type="submit">Find Now!</button></div>'
            '<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" /><label class="form-check-label" for="flexCheckDefault3">Option 3</label></div>'
        // '<div><input required type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button btn btn-danger">Delete</a></div>';
        var x = 1;

        $(addButton).click(function () {
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
        });

        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });

</script>
@endsection
