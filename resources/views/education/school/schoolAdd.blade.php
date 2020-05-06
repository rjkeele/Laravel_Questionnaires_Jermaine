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
          <label for="input_schoolStartMonth" id="label_input_schoolStartMonth">
            Start Month
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolStartMonth" placeholder="{{ Session::get('schoolStartMonth') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolStartMonth') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolStartYear" id="label_input_schoolStartYear">
            Start Year
          </label>
        </div>
        <div class="col-md-8 text-left">
          <input type="text" id="input_schoolStartYear" placeholder="{{ Session::get('schoolStartYear') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolStartYear') }}">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolEndMonth" id="label_input_schoolEndMonth">
            End Month
          </label>
        </div>
        <div class="col-md-8 text-left">
          {{--@if(Session::get('schoolEndMonth') == 'present')--}}
          {{--<input type="text" id="input_schoolEndMonth" placeholder="present"--}}
          {{--class="input-lg form-control-lg" value="present">--}}
          {{--@else--}}
          <input type="text" id="input_schoolEndMonth" placeholder="{{ Session::get('schoolEndMonth') }}"
                 class="input-lg form-control-lg" value="{{ Session::get('schoolEndMonth') }}">
          {{--@endif--}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 text-right">
          <label for="input_schoolEndYear" id="label_input_schoolEndYear">
            End Year
          </label>
        </div>
        <div class="col-md-8 text-left">
          @if(Session::get('schoolEndYear') == 'present present')
            <input type="text" id="input_schoolEndYear" placeholder="present"
                   class="input-lg form-control-lg" value="present">
          @else
            <input type="text" id="input_schoolEndYear" placeholder="{{ Session::get('schoolEndYear') }}"
                   class="input-lg form-control-lg" value="{{ Session::get('schoolEndYear') }}">
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
              var schoolStartYear = $('#input_schoolStartYear').val();
              var schoolEndYear = $('#input_schoolEndYear').val();
              var schoolStartMonth = $('#input_schoolStartMonth').val();
              var schoolEndMonth = $('#input_schoolEndMonth').val();
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
                      'schoolStartYear': schoolStartYear,
                      'schoolEndYear': schoolEndYear,
                      'schoolStartMonth': schoolStartMonth,
                      'schoolEndMonth': schoolEndMonth,
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
              var schoolStartYear = $('#input_schoolStartYear').val();
              var schoolEndYear = $('#input_schoolEndYear').val();
              var schoolStartMonth = $('#input_schoolStartMonth').val();
              var schoolEndMonth = $('#input_schoolEndMonth').val();
              var schoolCourse = $('#input_schoolCourse').val();
              var schoolQualification = $('#input_schoolQualification').val();

              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolChange',
                  data: {
                      'schoolNum': schoolNum,
                      'schoolName': schoolName,
                      'schoolCountry': schoolCountry,
                      'schoolStartYear': schoolStartYear,
                      'schoolEndYear': schoolEndYear,
                      'schoolStartMonth': schoolStartMonth,
                      'schoolEndMonth': schoolEndMonth,
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