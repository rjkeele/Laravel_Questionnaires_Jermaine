@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Country is {employmentCompany} in?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyCountry" id="label_input_companyCountry">
          COMPANY COUNTRY
        </label><br>
        <input type="text" id="input_companyCountry" name="companyCountry" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_companyCountry_continue">
        <button id="btn_companyCountry_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyCountry_continue').click(function () {
              var companyCountry = $('#input_companyCountry').val();
              window.location.href = '/workExperience/journey1/city';
          });
      });
  </script>
@endsection