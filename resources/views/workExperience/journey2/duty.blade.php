@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Were Your Main Duties & Achievements at {{ Session::get('journey2Company') }}?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyDuty" id="label_input_companyDuty">
          JOB DUTIES & ACHIEVEMENTS
        </label><br>
        <textarea rows="5" type="text" id="input_companyDuty" name="companyDuty" class="input-lg"></textarea>
      </div>
      <br><br>
      <div class="text-center" id="div_companyDuty_continue">
        <button id="btn_companyDuty_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyDuty_continue').click(function () {
              var companyDuty = $('#input_companyDuty').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/journey2/duty',
                  data: {
                      'companyDuty': companyDuty,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success')
                          window.location.href = '/workExperience/journey2/addJob';
                  }
              });
          });
      });
  </script>
@endsection