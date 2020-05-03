@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      What's Country Is The School in?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
        <label for="input_schoolCountry" id="label_input_schoolCountry">
          SCHOOL COUNTRY
        </label><br>
        <input list="countryList" id="input_schoolCountry" name="schoolCountry" class="input-lg form-control-lg">
        <datalist id="countryList">
          @foreach($data['countries'] as $country)
            <option value="{{ $country->resourceCountryName }}">{{ $country->resourceCountryName }}</option>
          @endforeach
        </datalist>
      </div>
      <br><br>
      <div class="text-center" id="div_schoolCountry_continue">
        <button id="btn_schoolCountry_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolCountry_continue').click(function () {
              var schoolCountry = $('#input_schoolCountry').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolCountry',
                  data: {
                      'schoolCountry': schoolCountry
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = "/education/school/graduate";
                      }
                  }
              });
          });
      });
  </script>
@endsection