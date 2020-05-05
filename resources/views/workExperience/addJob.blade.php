@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You’ve Just Added {{ Session::get('companyName') }}
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
          <input type="text" id="input_companyName" placeholder="{{ Session::get('companyName') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('companyName') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyCountry" id="label_input_companyCountry">
            Country
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyCountry" placeholder="{{ Session::get('companyCountry') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('companyCountry') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_companyCity" id="label_input_companyCity">
            Town/City
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_companyCity" placeholder="{{ Session::get('companyCity') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('companyCity') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobStartDate" id="label_input_jobStartDate">
            Job Start Date
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobStartDate" placeholder="{{ Session::get('jobStartDate') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('jobStartDate') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_jobEndDate" id="label_input_jobEndDate">
            End Date
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_jobEndDate" placeholder="{{ Session::get('jobEndDate') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('jobEndDate') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolCourse" id="label_input_schoolCourse">
            Course Title
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolCourse" placeholder="{{ Session::get('schoolCourse') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolCourse') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolQualification" id="label_input_schoolQualification">
            Qualification
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolQualification" placeholder="{{ Session::get('schoolQualification') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolQualification') }}">
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_schoolQualification_continue">
        @if(Session::get('schoolNum') < 3 )
          <button id="btn_addSchool" class="btn btn-lg btn-info"> ADD ANOTHER SCHOOL</button>
          <button id="btn_addSchool_skip" class="btn btn-lg btn-success" type="button"> SKIP</button>
        @else
          <button id="btn_addSchool_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          var schoolNum = '{{ Session::get('schoolNum') }}';
          $('#btn_addSchool').click(function () {
              var companyName = $('#input_companyName').val();
              var companyCountry = $('#input_companyCountry').val();
              var jobStartDate = $('#input_jobStartDate').val();
              var jobEndDate = $('#input_jobEndDate').val();
              var schoolCourse = $('#input_schoolCourse').val();
              var schoolQualification = $('#input_schoolQualification').val();
              // alert(companyName);
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolAdd',
                  data: {
                      'schoolNum': schoolNum,
                      'companyName': companyName,
                      'companyCountry': companyCountry,
                      'jobStartDate': jobStartDate,
                      'jobEndDate': jobEndDate,
                      'schoolCourse': schoolCourse,
                      'schoolQualification': schoolQualification,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = '/education/school/name';
                      }
                  }
              });
          });

          $('#btn_addSchool_skip').click(function () {
              window.location.href = '/education/school/review';
          });

          $('#btn_addSchool_continue').click(function () {
              var companyName = $('#input_companyName').val();
              var companyCountry = $('#input_companyCountry').val();
              var jobStartDate = $('#input_jobStartDate').val();
              var jobEndDate = $('#input_jobEndDate').val();
              var schoolCourse = $('#input_schoolCourse').val();
              var schoolQualification = $('#input_schoolQualification').val();

              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolChange',
                  data: {
                      'companyName': companyName,
                      'companyCountry': companyCountry,
                      'jobStartDate': jobStartDate,
                      'jobEndDate': jobEndDate,
                      'schoolCourse': schoolCourse,
                      'schoolQualification': schoolQualification,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = '/education/school/review';
                      }
                  }
              });

          });
      });
  </script>
@endsection