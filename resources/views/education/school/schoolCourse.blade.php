@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What's The Name of The Course You Studied a {schoolName}?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_schoolCourse" id="label_input_schoolCourse">
          COURSE TITLE
        </label><br>
        <input type="text" id="input_schoolCourse" name="schoolCourse" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_schoolCourse_continue">
        <button id="btn_schoolCourse_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolCourse_continue').click(function () {
              var schoolName = $('#input_schoolCourse').val();
              window.location.href = '/education/school/qualification';
          });
      });
  </script>
@endsection