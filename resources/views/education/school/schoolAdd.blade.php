@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You’ve Just Added {{ Session::get('schoolName') }}
    </div>
    <div id="content-subheader">
      <p>Do you want to add another school. Employers usually like to see details of two schools you’ve been to!</p>
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolName" id="label_input_schoolName">
            SchoolName
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolName" placeholder="{{ Session::get('schoolName') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolName') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolCountry" id="label_input_schoolCountry">
            Country
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolCountry" placeholder="{{ Session::get('schoolCountry') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolCountry') }}">
        </div>

      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolStartDate" id="label_input_schoolStartDate">
            Start Date
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolStartDate" placeholder="{{ Session::get('schoolStartDate') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolStartDate') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolEndDate" id="label_input_schoolEndDate">
            End Date
          </label>
        </div>
        <div class="col-md-8 text-left">
          @if(Session::get('schoolEndDate') == 'present present')
            <input type="text" id="input_schoolEndDate" placeholder="present"
                   class="input-lg form-control-lg" value="present">
          @else
            <input type="text" id="input_schoolEndDate" placeholder="{{ Session::get('schoolEndDate') }}"
                   class="input-lg form-control-lg" value="{{ Session::get('schoolEndDate') }}">
          @endif
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
              var schoolName = $('#input_schoolName').val();
              var schoolCountry = $('#input_schoolCountry').val();
              var schoolStartDate = $('#input_schoolStartDate').val();
              var schoolEndDate = $('#input_schoolEndDate').val();
              var schoolCourse = $('#input_schoolCourse').val();
              var schoolQualification = $('#input_schoolQualification').val();
              // alert(schoolName);
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolAdd',
                  data: {
                      'schoolNum': schoolNum,
                      'schoolName': schoolName,
                      'schoolCountry': schoolCountry,
                      'schoolStartDate': schoolStartDate,
                      'schoolEndDate': schoolEndDate,
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
              var schoolName = $('#input_schoolName').val();
              var schoolCountry = $('#input_schoolCountry').val();
              var schoolStartDate = $('#input_schoolStartDate').val();
              var schoolEndDate = $('#input_schoolEndDate').val();
              var schoolCourse = $('#input_schoolCourse').val();
              var schoolQualification = $('#input_schoolQualification').val();

              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolChange',
                  data: {
                      'schoolName': schoolName,
                      'schoolCountry': schoolCountry,
                      'schoolStartDate': schoolStartDate,
                      'schoolEndDate': schoolEndDate,
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