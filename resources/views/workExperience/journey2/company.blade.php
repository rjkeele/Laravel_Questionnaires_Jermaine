@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Company Did You Work For?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_company" id="label_input_company">
          COMPANY NAME
        </label><br>
        <input type="text" id="input_company" name="company" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_company_continue">
        <button id="btn_company_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_company_continue').click(function () {
              var company = $('#input_company').val();
              window.location.href = '/workExperience/journey2/country';
          });
      });
  </script>
@endsection