@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Do You Have a Personal Website That Shows Off Your Professional Skills?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        <label for="input_website" id="label_input_website">
          WEBSITE USER
        </label><br>
        <input type="text" id="input_website" name="website" class="input-lg form-control-lg">
      </div>
    </div>
    <br><br>
    <div class="text-center" id="div_website_continue">
      <button id="btn_website_skip" class="btn btn-lg btn-info"> SKIP </button>&nbsp;&nbsp;
      <button id="btn_website_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_website_continue').click(function () {
              // var contact = $('#input_schoolName').val();
              window.location.href = '/social/media';
          });
      });
  </script>
@endsection