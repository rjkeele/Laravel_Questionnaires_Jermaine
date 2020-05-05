@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You've Just Added {{Session::get('journey2Company')}}
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
            <div class="form-group row">
              <div class="col-md-4 text-right">
                <label for="input_companyName" id="label_input_companyName">
                  Company Name
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyName" placeholder="{{ $data['companies'][0] -> journey1Company }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1Company }}" disabled>
              </div>

            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyCountry" id="label_input_companyCountry">
                  Country
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyCountry"
                       placeholder="{{ $data['companies'][0] -> journey1Country }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1Country }}" disabled>
              </div>

            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyCity" id="label_input_companyCity">
                  Town/City
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyCity" placeholder="{{ $data['companies'][0] -> journey1City }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1City }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyJob" id="label_input_companyJob">
                  Job Title
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyJob" placeholder="{{ $data['companies'][0] -> journey1Job }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1Job }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobStartDate" id="label_input_jobStartDate">
                  Job Start Date
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobStartDate" placeholder="{{ $data['companies'][0] -> journey1StartJob }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1StartJob }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobEndDate" id="label_input_jobEndDate">
                  Job End Date
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobEndDate" placeholder="present"
                       class="input-lg form-control-lg" value="present" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobSummary" id="label_input_jobSummary">
                  Job Summary
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobSummary" placeholder="{{ $data['companies'][0] -> journey1Duty }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey1Duty }}" disabled>
              </div>
            </div>
          </div>
        @endif
        <div class="col-md-4 row">
          <div class="form-group row">
            <div class="col-md-4 text-right">
              <label for="input_companyName" id="label_input_companyName">
                Company Name
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyName" placeholder="{{ $data['companies'][0] -> journey2Company1 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Company1 }}" disabled>
            </div>

          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyCountry" id="label_input_companyCountry">
                Country
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyCountry" placeholder="{{ $data['companies'][0] -> journey2Country1 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Country1 }}" disabled>
            </div>

          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyCity" id="label_input_companyCity">
                Town/City
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyCity" placeholder="{{ $data['companies'][0] -> journey2City1 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2City1 }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyJob" id="label_input_companyJob">
                Job Title
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyJob" placeholder="{{ $data['companies'][0] -> journey2Job1 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Job1 }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobStartDate" id="label_input_jobStartDate">
                Job Start Date
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobStartDate"
                     placeholder="{{ $data['companies'][0] -> lastJobStartMonth1 }} {{ $data['companies'][0] -> lastJobStartYear1 }}"
                     class="input-lg form-control-lg"
                     value="{{ $data['companies'][0] -> lastJobStartMonth1 }} {{ $data['companies'][0] -> lastJobStartYear1 }}"
                     disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobEndDate" id="label_input_jobEndDate">
                Job End Date
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobEndDate"
                     placeholder="{{ $data['companies'][0] -> lastJobEndMonth1 }} {{ $data['companies'][0] -> lastJobEndYear1 }}"
                     class="input-lg form-control-lg"
                     value="{{ $data['companies'][0] -> lastJobEndMonth1 }} {{ $data['companies'][0] -> lastJobEndYear1 }}"
                     disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobSummary" id="label_input_jobSummary">
                Job Summary
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobSummary" placeholder="{{ $data['companies'][0] -> journey2Duty1 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Duty1 }}" disabled>
            </div>
          </div>
        </div>
        <div class="col-md-4 row">
          <div class="form-group row">
            <div class="col-md-4 text-right">
              <label for="input_companyName" id="label_input_companyName">
                Company Name
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyName" placeholder="{{ $data['companies'][0] -> journey2Company2 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Company2 }}" disabled>
            </div>

          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyCountry" id="label_input_companyCountry">
                Country
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyCountry" placeholder="{{ $data['companies'][0] -> journey2Country2 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Country2 }}" disabled>
            </div>

          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyCity" id="label_input_companyCity">
                Town/City
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyCity" placeholder="{{ $data['companies'][0] -> journey2City2 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2City2 }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_companyJob" id="label_input_companyJob">
                Job Title
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_companyJob" placeholder="{{ $data['companies'][0] -> journey2Job2 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Job2 }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobStartDate" id="label_input_jobStartDate">
                Job Start Date
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobStartDate"
                     placeholder="{{ $data['companies'][0] -> lastJobStartMonth2 }} {{ $data['companies'][0] -> lastJobStartYear2 }}"
                     class="input-lg form-control-lg"
                     value="{{ $data['companies'][0] -> lastJobStartMonth2 }} {{ $data['companies'][0] -> lastJobStartYear2 }}"
                     disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobEndDate" id="label_input_jobEndDate">
                Job End Date
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobEndDate"
                     placeholder="{{ $data['companies'][0] -> lastJobEndMonth2 }} {{ $data['companies'][0] -> lastJobEndYear2 }}"
                     class="input-lg form-control-lg"
                     value="{{ $data['companies'][0] -> lastJobEndMonth2 }} {{ $data['companies'][0] -> lastJobEndYear2 }}"
                     disabled>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 text-right">
              <label for="input_jobSummary" id="label_input_jobSummary">
                Job Summary
              </label>
            </div>
            <div class="col-md-8 text-left">
              <input type="text" id="input_jobSummary" placeholder="{{ $data['companies'][0] -> journey2Duty2 }}"
                     class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Duty2 }}" disabled>
            </div>
          </div>
        </div>
        @if($data['companies'][0] -> workingNow == 'no')
          <div class="col-md-4 row">
            <div class="form-group row">
              <div class="col-md-4 text-right">
                <label for="input_companyName" id="label_input_companyName">
                  Company Name
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyName" placeholder="{{ $data['companies'][0] -> journey2Company3 }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Company3 }}"
                       disabled>
              </div>

            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyCountry" id="label_input_companyCountry">
                  Country
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyCountry"
                       placeholder="{{ $data['companies'][0] -> journey2Country3 }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Country3 }}"
                       disabled>
              </div>

            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyCity" id="label_input_companyCity">
                  Town/City
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyCity" placeholder="{{ $data['companies'][0] -> journey2City3 }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2City3 }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_companyJob" id="label_input_companyJob">
                  Job Title
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_companyJob" placeholder="{{ $data['companies'][0] -> journey2Job3 }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Job3 }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobStartDate" id="label_input_jobStartDate">
                  Job Start Date
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobStartDate"
                       placeholder="{{ $data['companies'][0] -> lastJobStartMonth3 }} {{ $data['companies'][0] -> lastJobStartYear3 }}"
                       class="input-lg form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobStartMonth3 }} {{ $data['companies'][0] -> lastJobStartYear3 }}"
                       disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobEndDate" id="label_input_jobEndDate">
                  Job End Date
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobEndDate"
                       placeholder="{{ $data['companies'][0] -> lastJobEndMonth3 }} {{ $data['companies'][0] -> lastJobEndYear3 }}"
                       class="input-lg form-control-lg"
                       value="{{ $data['companies'][0] -> lastJobEndMonth3 }} {{ $data['companies'][0] -> lastJobEndYear3 }}"
                       disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3 text-right">
                <label for="input_jobSummary" id="label_input_jobSummary">
                  Job Summary
                </label>
              </div>
              <div class="col-md-8 text-left">
                <input type="text" id="input_jobSummary" placeholder="{{ $data['companies'][0] -> journey2Duty3 }}"
                       class="input-lg form-control-lg" value="{{ $data['companies'][0] -> journey2Duty3 }}" disabled>
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
          $('input').css('width', '100%');
          $('#btn_journey1Review_continue').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/moveToNextSection',
                  data: {
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