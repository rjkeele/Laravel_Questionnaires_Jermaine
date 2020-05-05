@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Qualification Did You/Will You Graduate With?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_schoolQualification" id="label_input_schoolCourse">
          YOUR QUALIFICATION
        </label><br>
        <input type="text" id="input_schoolQualification" name="schoolQualification" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_schoolQualification_continue">
        <button id="btn_schoolQualification_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolQualification_continue').click(function () {
              var schoolQualification = $('#input_schoolQualification').val();
              if (schoolQualification === '') {
                  alert('Please input the field.');
              } else {
                  $.ajax({
                      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                      url: '/temp_info_save/schoolQualification',
                      data: {
                          'schoolQualification': schoolQualification,
                      },
                      type: 'post',
                      async: true,
                      success: function (result) {
                          if (result === 'success') {
                              window.location.href = '/education/school/add';
                          }
                      }
                  });
              }
          });
      });
  </script>
@endsection