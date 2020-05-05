@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What's The Name of Your School?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_schoolName" id="label_input_schoolName">
          SCHOOL NAME
        </label><br>
        <input type="text" id="input_schoolName" name="schoolName" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_schoolName_continue">
        <button id="btn_schoolName_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolName_continue').click(function () {
              var schoolName = $('#input_schoolName').val();
              var schoolNum = '{{ Session::get('schoolNum') }}';
              if (schoolName === ''){
                  alert('Please input the School Name.');
              } else {
                  $.ajax({
                      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                      url:'/temp_info_save/schoolName',
                      data: {
                          'schoolName': schoolName,
                          'schoolNum': schoolNum
                      },
                      type: 'post',
                      async: true,
                      success: function (result) {
                          if (result === 'success') {
                              window.location.href = "/education/school/country";
                          }
                      }
                  });
              }
          });
      });
  </script>
@endsection