@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What was your job title at {employmentCompany}?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyJob" id="label_input_companyJob">
          COMPANY JOB TITLE
        </label><br>
        <input type="text" id="input_companyJob" name="companyJob" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_companyJob_continue">
        <button id="btn_companyJob_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyJob_continue').click(function () {
              var companyJob = $('#input_companyJob').val();
              window.location.href = '/workExperience/journey2/duty';
          });
      });
  </script>
@endsection