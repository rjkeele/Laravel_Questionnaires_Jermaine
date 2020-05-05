@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Your Profile Review
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_newJob" id="label_input_newJob">
          NEW JOB TITLE
        </label><br>
        <input type="text" id="input_newJob" name="newJob" placeholder="{{ $data['profile'][0]->profileNewJob }}" value="{{ $data['profile'][0]->profileNewJob }}" class="input-lg form-control-lg">
      </div>
      <div class="form-group">
        <label for="input_personalSummary" id="label_input_personalSummary">
          PERSONAL SUMMARY
        </label><br>
        <textarea rows="5" type="text" id="input_personalSummary" name="personalSummary" placeholder="{{ $data['profile'][0]->profilePersonalSummary }}"
                  class="input-lg">{{ $data['profile'][0]->profilePersonalSummary }}</textarea>
      </div>
      <br><br>
      <div class="text-center" id="div_newJob_continue">
        <button id="btn_newJob_continue" class="btn btn-lg btn-success" type="button"> SAVE CHANGES </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_newJob_continue').click(function () {
              var newJob = $('#input_newJob').val();
              var summary = $('#input_personalSummary').val();
              var sectionId = '{{ Session::get('section_id') }}';
              // alert(summary);
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/profile/review',
                  data: {
                      'newJob': newJob,
                      'summary': summary,
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