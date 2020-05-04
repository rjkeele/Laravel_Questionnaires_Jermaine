@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What's The New Job Title You Are Going To Apply For?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_newJob" id="label_input_newJob">
          NEW JOB TITLE
        </label><br>
        <input type="text" id="input_newJob" name="newJob" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_newJob_continue">
        <button id="btn_newJob_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_newJob_continue').click(function () {
              var newJob = $('#input_newJob').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/profile/newJob',
                  data: {
                      'newJob': newJob
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      window.location.href = '/profile/personal';
                  }
              });
          });
      });
  </script>
@endsection