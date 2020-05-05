@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You've Just Added {{Session::get('schoolNum')}} Schools.
    </div>
    <div>
      {{--Do you want to add another school, Employers usually like to see details of two schools you've been to!--}}
      Your CV is starting to look great. <br>
      Now it's time to add your school history.
    </div>
    <br><br><br>
    <div id="content-body">
      <div id="content-body" class="row">
        <div class="col-md-4 row">
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolName1" id="label_input_companyName">
                School Name
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolName1" placeholder="{{ $data['schools'][0] -> schoolName1 }}"
                     class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolName1 }}"
              >
            </div>

          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolCountry1" id="label_input_schoolCountry1">
                Country
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolCountry1"
                     placeholder="{{ $data['schools'][0] -> schoolCountry1 }}"
                     class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCountry1 }}"
              >
            </div>

          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolGraduate1" id="label_input_companyCity">
                Graduated
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolGraduate1" placeholder="{{ $data['schools'][0] -> schoolGraduate1 }}"
                     class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolGraduate1 }}">
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolCourse1" id="label_input_companyJob">
                Course
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolCourse1" placeholder="{{ $data['schools'][0] -> schoolCourse1 }}"
                     class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCourse1 }}">
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolStartMonth1" id="label_input_schoolStartMonth1">
                Start Month
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolStartMonth1"
                     placeholder="{{ $data['schools'][0] -> schoolStartMonth1 }}"
                     class=" form-control form-control-lg"
                     value="{{ $data['schools'][0] -> schoolStartMonth1 }}"
              >
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolStartYear1" id="label_input_schoolStartYear1">
                Start Year
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolStartYear1"
                     placeholder="{{ $data['schools'][0] -> schoolStartYear1 }}"
                     class=" form-control form-control-lg"
                     value="{{ $data['schools'][0] -> schoolStartYear1 }}"
              >
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolEndMonth1" id="label_input_schoolEndDate">
                End Month
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolEndMonth1"
                     placeholder="{{ $data['schools'][0] -> schoolEndMonth1 }}"
                     class=" form-control form-control-lg"
                     value="{{ $data['schools'][0] -> schoolEndMonth1 }}"
              >
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolEndYear1" id="label_input_schoolEndDate">
                End Year
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolEndYear1"
                     placeholder="{{ $data['schools'][0] -> schoolEndYear1 }}"
                     class=" form-control form-control-lg"
                     value="{{ $data['schools'][0] -> schoolEndYear1 }}"
              >
            </div>
          </div>
          <div class="div_form_group form-group row">
            <div class="col-md-3 ">
              <label for="schoolQualification1" id="label_input_schoolSummary1">
                Qualification
              </label>
            </div>
            <div class="col-md-9 text-left">
              <input type="text" id="schoolQualification1"
                     placeholder="{{ $data['schools'][0] -> schoolQualification1 }}"
                     class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolQualification1 }}">
            </div>
          </div>
        </div>

        @if((int)Session::get('schoolNum') > 1)
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolName2" id="label_input_companyName">
                  School Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolName2" placeholder="{{ $data['schools'][0] -> schoolName2 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolName2 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolCountry2" id="label_input_companyCountry">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolCountry2"
                       placeholder="{{ $data['schools'][0] -> schoolCountry2 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCountry2 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolGraduate2" id="label_input_companyCity">
                  Graduated
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolGraduate2" placeholder="{{ $data['schools'][0] -> schoolGraduate2 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolGraduate2 }}">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolCourse2" id="label_input_companyJob">
                  Course
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolCourse2" placeholder="{{ $data['schools'][0] -> schoolCourse2 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCourse2 }}">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolStartMonth2" id="label_input_schoolStartDate">
                  Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolStartMonth2"
                       placeholder="{{ $data['schools'][0] -> schoolStartMonth2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolStartMonth2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolStartYear2" id="label_input_schoolStartDate">
                  Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolStartYear2"
                       placeholder="{{ $data['schools'][0] -> schoolStartYear2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolStartYear2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolEndMonth2" id="label_input_schoolEndDate">
                  End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolEndMonth2"
                       placeholder="{{ $data['schools'][0] -> schoolEndMonth2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolEndMonth2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolEndYear2" id="label_input_schoolEndDate">
                  End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolEndYear2"
                       placeholder="{{ $data['schools'][0] -> schoolEndYear2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolEndYear2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolQualification2" id="label_input_schoolSummary">
                  Qualification
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolQualification2"
                       placeholder="{{ $data['schools'][0] -> schoolQualification2 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolQualification2 }}"
                >
              </div>
            </div>
          </div>
        @endif
        {{----}}
        @if((int)Session::get('schoolNum') > 2)
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolName3" id="label_input_companyName">
                  School Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolName3" placeholder="{{ $data['schools'][0] -> schoolName3 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolName3 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolCountry3" id="label_input_companyCountry">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolCountry3"
                       placeholder="{{ $data['schools'][0] -> schoolCountry3 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCountry3 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolGraduate3" id="label_input_companyCity">
                  Graduated
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolGraduate3" placeholder="{{ $data['schools'][0] -> schoolGraduate3 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolGraduate3 }}">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolCourse3" id="label_input_companyJob">
                  Course
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolCourse3" placeholder="{{ $data['schools'][0] -> schoolCourse3 }}"
                       class=" form-control form-control-lg" value="{{ $data['schools'][0] -> schoolCourse3 }}">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 float">
                <label for="schoolStartMonth3" id="label_input_schoolStartDate">
                  Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolStartMonth3"
                       placeholder="{{ $data['schools'][0] -> schoolStartMonth3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolStartMonth3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 float">
                <label for="schoolStartYear3" id="label_input_schoolStartDate">
                  Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolStartYear3"
                       placeholder="{{ $data['schools'][0] -> schoolStartYear3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolStartYear3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolEndMonth3" id="label_input_schoolEndDate">
                  End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolEndMonth3"
                       placeholder="{{ $data['schools'][0] -> schoolEndMonth3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolEndMonth3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 ">
                <label for="schoolEndYear3" id="label_input_schoolEndDate">
                  End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="schoolEndYear3"
                       placeholder="{{ $data['schools'][0] -> schoolEndYear3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['schools'][0] -> schoolEndYear3 }}"
                >
              </div>
            </div>
          </div>
        @endif
      </div>

      <div class="text-center" id="div_schoolReview_continue">
        <button id="btn_schoolReview_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolReview_continue').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';
              var schoolName1 = $('#schoolName1').val();
              var schoolCountry1 = $('#schoolCountry1').val();
              var schoolGraduate1 = $('#schoolGraduate1').val();
              var schoolCourse1 = $('#schoolCourse1').val();
              var schoolStartMonth1 = $('#schoolStartMonth1').val();
              var schoolStartYear1 = $('#schoolStartYear1').val();
              var schoolEndMonth1 = $('#schoolEndMonth1').val();
              var schoolEndYear1 = $('#schoolEndYear1').val();
              var schoolQualification1 = $('#schoolQualification1').val();
              var schoolName2 = $('#schoolName2').val();
              var schoolCountry2 = $('#schoolCountry2').val();
              var schoolGraduate2 = $('#schoolGraduate2').val();
              var schoolCourse2 = $('#schoolCourse2').val();
              var schoolStartMonth2 = $('#schoolStartMonth2').val();
              var schoolStartYear2 = $('#schoolStartYear2').val();
              var schoolEndMonth2 = $('#schoolEndMonth2').val();
              var schoolEndYear2 = $('#schoolEndYear2').val();
              var schoolQualification2 = $('#schoolQualification2').val();
              var schoolName3 = $('#schoolName3').val();
              var schoolCountry3 = $('#schoolCountry3').val();
              var schoolGraduate3 = $('#schoolGraduate3').val();
              var schoolCourse3 = $('#schoolCourse3').val();
              var schoolStartMonth3 = $('#schoolStartMonth3').val();
              var schoolStartYear3 = $('schoolStartYear3').val();
              var schoolEndMonth3 = $('#schoolEndMonth3').val();
              var schoolEndYear3 = $('schoolEndYear3').val();
              var schoolQualification3 = $('#schoolQualification3').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  // url: '/moveToNextSection',
                  url: '/temp_info_save/schoolReview',
                  data: {
                      'schoolName1': schoolName1,
                      'schoolCountry1': schoolCountry1,
                      'schoolGraduate1': schoolGraduate1,
                      'schoolCourse1': schoolCourse1,
                      'schoolStartMonth1': schoolStartMonth1,
                      'schoolStartYear1': schoolStartYear1,
                      'schoolEndMonth1': schoolEndMonth1,
                      'schoolEndYear1': schoolEndYear1,
                      'schoolQualification1': schoolQualification1,
                      'schoolName2': schoolName2,
                      'schoolCountry2': schoolCountry2,
                      'schoolGraduate2': schoolGraduate2,
                      'schoolCourse2': schoolCourse2,
                      'schoolStartMonth2': schoolStartMonth2,
                      'schoolStartYear2': schoolStartYear2,
                      'schoolEndMonth2': schoolEndMonth2,
                      'schoolEndYear2': schoolEndYear2,
                      'schoolQualification2': schoolQualification2,
                      'schoolName3': schoolName3,
                      'schoolCountry3': schoolCountry3,
                      'schoolGraduate3': schoolGraduate3,
                      'schoolCourse3': schoolCourse3,
                      'schoolStartMonth3': schoolStartMonth3,
                      'schoolStartYear3': schoolStartYear3,
                      'schoolEndMonth3': schoolEndMonth3,
                      'schoolEndYear3': schoolEndYear3,
                      'schoolQualification3': schoolQualification3,
                      'sectionId': sectionId
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      window.location.href = result;
                  }
              });
          });
      });
  </script>
@endsection