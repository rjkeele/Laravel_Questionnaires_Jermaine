@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What Town/City of {{ Session::get('journey2Country') }} is {{ Session::get('journey2Company') }} in?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_companyCity" id="label_input_companyCity">
          COMPANY LOCATION
        </label><br>
        <input type="text" id="input_companyCity" name="companyCity" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_companyCity_continue">
        <button id="btn_companyCity_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyCity_continue').click(function () {
              var companyCity = $('#input_companyCity').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/journey2/city',
                  data: {
                      'companyCity': companyCity
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success')
                          window.location.href = '/workExperience/journey2/job';
                  }
              });
          });
      });
  </script>
@endsection