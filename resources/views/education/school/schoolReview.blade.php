@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You've Just Added {{Session::get('schoolName')}}
    </div>
    <div>
      {{--Do you want to add another school, Employers usually like to see details of two schools you've been to!--}}
      Your CV is starting to look great. <br>
      Now it's time to add your job history.
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      {{--<div class="form-group">--}}
      {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
      {{--<label for="input_schoolQualification" id="label_input_schoolCourse">--}}
      {{--YOUR QUALIFICATION--}}
      {{--</label><br>--}}
      {{--<input type="text" id="input_schoolQualification" name="schoolQualification" class="input-lg form-control-lg">--}}
      {{--</div>--}}
      {{--<br><br>--}}
      <div class="text-center" id="div_schoolQualification_continue">
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