@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      ​Employers Love to Know Exactly Where in The World You Are Located!
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="input_country" id="label_input_country">
              COUNTRY
            </label><br>
            <input list="countryList" id="input_country" name="country" class="input-lg form-control-lg">
            <datalist id="countryList">
              @foreach($data['countries'] as $country)
                <option value="{{ $country->resourceCountryName }}">{{ $country->resourceCountryName }}</option>
              @endforeach
            </datalist>
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="input_city" id="label_input_city">
              TOWN OR CITY
            </label><br>
            <input type="text" id="input_city" name="city" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="input_addressLine" id="label_input_addressLine">
              ADDRESS LINE 1
            </label><br>
            <input type="text" id="input_addressLine" name="addressLine" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_contact_continue">
        <button id="btn_location_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_location_continue').click(function () {
              var country = $('#input_country').val();
              var city = $('#input_city').val();
              var addressLine = $('#input_addressLine').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/personalise/location',
                  data: {
                      'country': country,
                      'city': city,
                      'addressLine': addressLine,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success')
                          window.location.href = '/personalise/website';
                  }
              });
          });
      });
  </script>
@endsection