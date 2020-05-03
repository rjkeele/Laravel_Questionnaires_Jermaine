@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Town/City of {employmentCountry} is {employmentCompany} in?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyCity" id="label_input_companyCity">
          COMPANY LOCATION
        </label><br>
        <input type="text" id="input_companyCity" name="companyCity" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_companyCity_continue">
        <button id="btn_companyCity_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyCity_continue').click(function () {
              var companyCity = $('#input_companyCity').val();
              window.location.href = '/workExperience/journey1/job';
          });
      });
  </script>
@endsection