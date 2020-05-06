@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You've Just Added {{Session::get('jobNum')}} Jobs
    </div>
    <div>
      {{--Do you want to add another school, Employers usually like to see details of two schools you've been to!--}}
      Employers love to see details of your last jobs! <br> You’re read to move on to the next section.
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div id="content-body" class="row">
        @if($data['companies'][0] -> workingNow == 'yes')
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1Company" id="label_journey1Company">
                  Company Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1Company" placeholder="{{ $data['companies'][0] -> journey1Company }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1Company }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1Country" id="label_journey1Country">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1Country"
                       placeholder="{{ $data['companies'][0] -> journey1Country }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1Country }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1City" id="label_journey1City">
                  Town/City
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1City" placeholder="{{ $data['companies'][0] -> journey1City }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1City }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1Job" id="label_journey1Job">
                  Job Title
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1Job" placeholder="{{ $data['companies'][0] -> journey1Job }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1Job }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1StartMonth" id="label_journey1StartMonth">
                  Job Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1StartMonth"
                       placeholder="{{ $data['companies'][0] -> journey1StartMonth }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1StartMonth }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1StartYear" id="label_journey1StartYear">
                  Job Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1StartYear" placeholder="{{ $data['companies'][0] -> journey1StartYear }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1StartYear }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1EndMonth" id="label_journey1EndMonth">
                  Job End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1EndMonth" placeholder="present"
                       class=" form-control form-control-lg" value="present">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1EndYear" id="label_journey1EndYear">
                  Job End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1EndYear" placeholder="present"
                       class=" form-control form-control-lg" value="present">
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey1Duty" id="label_journey1Duty">
                  Job Summary
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey1Duty" placeholder="{{ $data['companies'][0] -> journey1Duty }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey1Duty }}"
                >
              </div>
            </div>
          </div>
        @endif
        @if(((int)Session::get('jobNum') - (int)Session::get('job1Num')) == 1)
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Company1" id="label_journey2Company1">
                  Company Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Company1" placeholder="{{ $data['companies'][0] -> journey2Company1 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Company1 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Country1" id="label_journey2Country1">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Country1"
                       placeholder="{{ $data['companies'][0] -> journey2Country1 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Country1 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2City1" id="label_journey2City1">
                  Town/City
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2City1" placeholder="{{ $data['companies'][0] -> journey2City1 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2City1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Job1" id="label_journey2Job1">
                  Job Title
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Job1" placeholder="{{ $data['companies'][0] -> journey2Job1 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Job1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartMonth1" id="label_jobStartDate">
                  Job Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartMonth1"
                       placeholder="{{ $data['companies'][0] -> lastJobStartMonth1 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartMonth1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartYear1" id="label_jobStartDate">
                  Job Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartYear1"
                       placeholder="{{ $data['companies'][0] -> lastJobStartYear1 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartYear1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndMonth1" id="label_lastJobEndMonth1">
                  Job End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndMonth1"
                       placeholder="{{ $data['companies'][0] -> lastJobEndMonth1 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndMonth1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndYear1" id="label_lastJobEndYear1">
                  Job End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndYear1"
                       placeholder="{{ $data['companies'][0] -> lastJobEndYear1 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndYear1 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Duty1" id="label_journey2Duty1">
                  Job Summary
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Duty1" placeholder="{{ $data['companies'][0] -> journey2Duty1 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Duty1 }}"
                >
              </div>
            </div>
          </div>
        @endif

        @if(((int)Session::get('jobNum') - (int)Session::get('job1Num')) > 1)
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Company2" id="label_journey2Company2">
                  Company Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Company2" placeholder="{{ $data['companies'][0] -> journey2Company2 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Company2 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Country2" id="label_journey2Country2">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Country2"
                       placeholder="{{ $data['companies'][0] -> journey2Country2 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Country2 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2City2" id="label_journey2City2">
                  Town/City
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2City2" placeholder="{{ $data['companies'][0] -> journey2City2 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2City2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Job2" id="label_journey2Job2">
                  Job Title
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Job2" placeholder="{{ $data['companies'][0] -> journey2Job2 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Job2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartMonth2" id="label_jobStartDate">
                  Job Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartMonth1"
                       placeholder="{{ $data['companies'][0] -> lastJobStartMonth2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartMonth2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartYear2" id="label_jobStartDate">
                  Job Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartYear2"
                       placeholder="{{ $data['companies'][0] -> lastJobStartYear2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartYear2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndMonth2" id="label_lastJobEndMonth2">
                  Job End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndMonth2"
                       placeholder="{{ $data['companies'][0] -> lastJobEndMonth2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndMonth2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndYear2" id="label_lastJobEndYear2">
                  Job End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndYear2"
                       placeholder="{{ $data['companies'][0] -> lastJobEndYear2 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndYear2 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Duty2" id="label_journey2Duty2">
                  Job Summary
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Duty2" placeholder="{{ $data['companies'][0] -> journey2Duty2 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Duty2 }}"
                >
              </div>
            </div>
          </div>
        @endif

        @if(((int)Session::get('jobNum') - (int)Session::get('job2Num')) > 2)
          <div class="col-md-4 row">
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Company3" id="label_journey2Company3">
                  Company Name
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Company3" placeholder="{{ $data['companies'][0] -> journey2Company3 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Company3 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Country3" id="label_journey2Country3">
                  Country
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Country3"
                       placeholder="{{ $data['companies'][0] -> journey2Country3 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Country3 }}"
                >
              </div>

            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2City3" id="label_journey2City3">
                  Town/City
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2City3" placeholder="{{ $data['companies'][0] -> journey2City3 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2City3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Job3" id="label_journey2Job3">
                  Job Title
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Job3" placeholder="{{ $data['companies'][0] -> journey2Job3 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Job3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartMonth3" id="label_jobStartDate">
                  Job Start Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartMonth3"
                       placeholder="{{ $data['companies'][0] -> lastJobStartMonth3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartMonth3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobStartYear3" id="label_jobStartDate">
                  Job Start Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobStartYear3"
                       placeholder="{{ $data['companies'][0] -> lastJobStartYear3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartYear3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndMonth3" id="label_lastJobEndMonth3">
                  Job End Month
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndMonth3"
                       placeholder="{{ $data['companies'][0] -> lastJobEndMonth3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndMonth3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="lastJobEndYear3" id="label_lastJobEndYear3">
                  Job End Year
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="lastJobEndYear3"
                       placeholder="{{ $data['companies'][0] -> lastJobEndYear3 }}"
                       class=" form-control form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndYear3 }}"
                >
              </div>
            </div>
            <div class="div_form_group form-group row">
              <div class="col-md-3 text-right">
                <label for="journey2Duty3" id="label_journey2Duty3">
                  Job Summary
                </label>
              </div>
              <div class="col-md-9 text-left">
                <input type="text" id="journey2Duty3" placeholder="{{ $data['companies'][0] -> journey2Duty3 }}"
                       class=" form-control form-control-lg" value="{{ $data['companies'][0] -> journey2Duty3 }}"
                >
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="text-center" id="div_schoolQualification_continue">
        <button id="btn_journey1Review_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {

          var sectionId = '{{ Session::get('section_id') }}';
          var sectionOrder = '{{ Session::get('section_order') }}';

          var currentSectionOrder = $('#sidelist_' + sectionId).attr('data-order');

          if (parseInt(currentSectionOrder) >= parseInt(sectionOrder)) {
              $('.progress-bar').css('width', '{{ round(((int)Session::get('section_order'))*100/10) }}%');
              $('#span_progress').html('{{ round(((int)Session::get('section_order'))*100/10) }}%');
          }

          $('input').css('width', '100%');
          $('#btn_journey1Review_continue').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';

              var journey1Company = $('#journey1Company').val();
              var journey1Country = $('#journey1Country').val();
              var journey1City = $('#journey1City').val();
              var journey1Job = $('#journey1Job').val();
              var journey1StartMonth = $('#journey1StartMonth').val();
              var journey1StartYear = $('#journey1StartYear').val();
              var journey1EndMonth = $('#journey1EndMonth').val();
              var journey1EndYear = $('#journey1EndYear').val();
              var journey1Duty = $('#journey1Duty').val();
              var journey2Company1 = $('#journey2Company1').val();
              var journey2Country1 = $('#journey2Country1').val();
              var journey2City1 = $('#journey2City1').val();
              var journey2Job1 = $('#journey2Job1').val();
              var lastJobStartMonth1 = $('#lastJobStartMonth1').val();
              var lastJobStartYear1 = $('#lastJobStartYear1').val();
              var lastJobEndMonth1 = $('#lastJobEndMonth1').val();
              var lastJobEndYear1 = $('#lastJobEndYear1').val();
              var journey2Duty1 = $('#journey2Duty1').val();
              var journey2Company2 = $('#journey2Company2').val();
              var journey2Country2 = $('#journey2Country2').val();
              var journey2City2 = $('#journey2City2').val();
              var journey2Job2 = $('#journey2Job2').val();
              var lastJobStartMonth2 = $('#lastJobStartMonth2').val();
              var lastJobStartYear2 = $('#lastJobStartYear2').val();
              var lastJobEndMonth2 = $('#lastJobEndMonth2').val();
              var lastJobEndYear2 = $('#lastJobEndYear2').val();
              var journey2Duty2 = $('#journey2Duty2').val();
              var journey2Company3 = $('#journey2Company3').val();
              var journey2Country3 = $('#journey2Country3').val();
              var journey2City3 = $('#journey2City3').val();
              var journey2Job3 = $('#journey2Job3').val();
              var lastJobStartMonth3 = $('#lastJobStartMonth3').val();
              var lastJobStartYear3 = $('#lastJobStartYear3').val();
              var lastJobEndMonth3 = $('#lastJobEndMonth3').val();
              var lastJobEndYear3 = $('#lastJobEndYear3').val();
              var journey2Duty3 = $('#journey2Duty3').val();

              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/review',
                  data: {
                      'journey1Company': journey1Company,
                      'journey1Country': journey1Country,
                      'journey1City': journey1City,
                      'journey1Job': journey1Job,
                      'journey1StartMonth': journey1StartMonth,
                      'journey1StartYear': journey1StartYear,
                      'journey1EndMonth': journey1EndMonth,
                      'journey1EndYear': journey1EndYear,
                      'journey1Duty': journey1Duty,
                      'journey2Company1': journey2Company1,
                      'journey2Country1': journey2Country1,
                      'journey2City1': journey2City1,
                      'journey2Job1': journey2Job1,
                      'lastJobStartMonth1': lastJobStartMonth1,
                      'lastJobStartYear1': lastJobStartYear1,
                      'lastJobEndMonth1': lastJobEndMonth1,
                      'lastJobEndYear1': lastJobEndYear1,
                      'journey2Duty1': journey2Duty1,
                      'journey2Company2': journey2Company2,
                      'journey2Country2': journey2Country2,
                      'journey2City2': journey2City2,
                      'journey2Job2': journey2Job2,
                      'lastJobStartMonth2': lastJobStartMonth2,
                      'lastJobStartYear2': lastJobStartYear2,
                      'lastJobEndMonth2': lastJobEndMonth2,
                      'lastJobEndYear2': lastJobEndYear2,
                      'journey2Duty2': journey2Duty2,
                      'journey2Company3': journey2Company3,
                      'journey2Country3': journey2Country3,
                      'journey2City3': journey2City3,
                      'journey2Job3': journey2Job3,
                      'lastJobStartMonth3': lastJobStartMonth3,
                      'lastJobStartYear3': lastJobStartYear3,
                      'lastJobEndMonth3': lastJobEndMonth3,
                      'lastJobEndYear3': lastJobEndYear3,
                      'journey2Duty3': journey2Duty3,
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