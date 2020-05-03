@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Company Do You Currently Work For?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyName" id="label_input_companyName">
          COMPANY NAME
        </label><br>
        <input type="text" id="input_companyName" name="companyName" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_companyName_continue">
        <button id="btn_companyName_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyName_continue').click(function () {
              var companyName = $('#input_companyName').val();
              window.location.href = '/workExperience/journey1/country';
          });
      });
  </script>
@endsection