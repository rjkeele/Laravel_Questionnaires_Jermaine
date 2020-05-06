@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You’ve Just Added {{ Session::get('journey2Company') }}
    </div>
    <div id="content-subheader">
      <p> Do you want to add another piece of work experience? Employers usually like to see details of your last 3 jobs!</p>
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyName" id="label_input_companyName">
            Company Name
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyName" placeholder="{{ Session::get('journey2Company') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2Company') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyCountry" id="label_input_companyCountry">
            Country
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyCountry" placeholder="{{ Session::get('journey2Country') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2Country') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyCity" id="label_input_companyCity">
            Town/City
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyCity" placeholder="{{ Session::get('journey2City') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2City') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyJob" id="label_input_companyJob">
            Job Title
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyJob" placeholder="{{ Session::get('journey2Job') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2Job') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobStartMonth" id="label_input_jobStartMonth">
            Job Start Month
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobStartMonth" placeholder="{{ Session::get('journey2StartMonth') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2StartMonth') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobStartYear" id="label_input_jobStartYear">
            Job Start Year
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobStartYear" placeholder="{{ Session::get('journey2StartYear') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2StartYear') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobEndMonth" id="label_input_jobEndMonth">
            End Month
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobEndMonth" placeholder="{{ Session::get('journey2EndMonth') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2EndMonth') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobEndYear" id="label_input_jobEndYear">
            End Year
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobEndYear" placeholder="{{ Session::get('journey2EndYear') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2EndYear') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobSummary" id="label_input_jobSummary">
            Job Summary
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobSummary" placeholder="{{ Session::get('journey2Summary') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('journey2Summary') }}">
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_journey2AddJob_continue">
        @if(Session::get('jobNum') < 3 )
          <button id="btn_addJob" class="btn btn-lg btn-info"> ADD ANOTHER JOB</button>
          <button id="btn_addJob_skip" class="btn btn-lg btn-success" type="button"> SKIP</button>
        @else
          <button id="btn_addJob_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          var jobNum = '{{ Session::get('jobNum') }}';
          var job1Num = '{{ Session::get('job1Num') }}';
          $('#btn_addJob').click(function () {
              var companyName = $('#input_companyName').val();
              var companyCountry = $('#input_companyCountry').val();
              var companyCity = $('#input_companyCity').val();
              var jobTitle = $('#input_companyJob').val();
              var jobStartMonth = $('#input_jobStartMonth').val();
              var jobEndMonth = $('#input_jobEndMonth').val();
              var jobStartYear = $('#input_jobStartYear').val();
              var jobEndYear = $('#input_jobEndYear').val();
              var jobSummary = $('#input_jobSummary').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/journey2/addJob',
                  data: {
                      'jobNum': jobNum,
                      'job1Num': job1Num,
                      'companyName': companyName,
                      'companyCountry': companyCountry,
                      'companyCity': companyCity,
                      'jobStartMonth': jobStartMonth,
                      'jobEndMonth': jobEndMonth,
                      'jobStartYear': jobStartYear,
                      'jobEndYear': jobEndYear,
                      'jobTitle': jobTitle,
                      'jobSummary': jobSummary,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = '/workExperience/journey2/lastJob';
                      }
                  }
              });
          });

          $('#btn_addJob_skip').click(function () {
              window.location.href = '/workExperience/review';
          });

          $('#btn_addJob_continue').click(function () {
              var companyName = $('#input_companyName').val();
              var companyCountry = $('#input_companyCountry').val();
              var companyCity = $('#input_companyCity').val();
              var jobTitle = $('#input_companyJob').val();
              var jobStartMonth = $('#input_jobStartMonth').val();
              var jobEndMonth = $('#input_jobEndMonth').val();
              var jobStartYear = $('#input_jobStartYear').val();
              var jobEndYear = $('#input_jobEndYear').val();
              var jobSummary = $('#input_jobSummary').val();

              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/journey2/jobChange',
                  data: {
                      'companyName': companyName,
                      'companyCountry': companyCountry,
                      'companyCity': companyCity,
                      'jobStartMonth': jobStartMonth,
                      'jobEndMonth': jobEndMonth,
                      'jobStartYear': jobStartYear,
                      'jobEndYear': jobEndYear,
                      'jobTitle': jobTitle,
                      'jobSummary': jobSummary,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = '/workExperience/journey2/review';
                      }
                  }
              });

          });
      });
  </script>
@endsection