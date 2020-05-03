@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      Have You Graduated From This School Yet or Are You Still Studying?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="radio-button-group-container form-group">
        <input type="hidden" id="input_hidden_graduate" name="hidden_graduate">
        <label for="graduate" class="label_radio_buttons" data-id="yes" style="margin-right: 35px">
          <input type="radio" name="graduate" id="graduate"
                 class="input_radio_button" value="yes">
          <div class="div_radio_button text-center">
            <img src="" alt="image" height="80" style="margin-bottom: 20px">
            <h6>Graduated</h6>
          </div>
        </label>
        <label for="studying" class="label_radio_buttons" data-id="no">
          <input type="radio" name="graduate" id="studying"
                 class="input_radio_button" value="no">
          <div class="div_radio_button text-center">
            <img src="" alt="image" height="80" style="margin-bottom: 20px">
            <h6>Still Studying</h6>
          </div>
        </label>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.div_radio_button').click(function () {
              $('.input_radio_button').removeAttr('checked');
              var graduated = $(this).parent().attr('data-id');
              $('.input_radio_button').val(graduated);
              // var sss = $('.input_radio_button').val();
              $('#input_hidden_graduate').val(graduated);
              window.location.href = "/education/school/period";
          });
      });
  </script>
@endsection