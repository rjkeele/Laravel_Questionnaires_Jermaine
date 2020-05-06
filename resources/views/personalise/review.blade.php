@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Your Personalise Review
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="input_firstName" id="label_input_firstName">
              FIRST NAME
            </label><br>
            <input type="text" id="input_firstName" value="{{ $data['personalise'][0]->personaliseFirstName }}"
                   name="firstName" class="input-lg form-control-lg">
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="input_lastName" id="label_input_lastName">
              LAST NAME
            </label><br>
            <input type="text" id="input_lastName" name="lastName"
                   value="{{ $data['personalise'][0]->personaliseLastName }}" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="input_mobileNumber" id="label_input_mobileNumber">
              MOBILE NUMBER
            </label><br>
            <input type="text" id="input_mobileNumber" name="mobileNumber"
                   value="{{ $data['personalise'][0]->personaliseMobileNumber }}" class="input-lg form-control-lg">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <input type="hidden" id="input_hidden_emailAddress" name="hidden_emailAddress">
            <label for="input_schoolName" id="label_input_schoolName">
              EMAIL ADDRESS
            </label><br>
            <input type="text" id="input_emailAddress" value="{{ $data['personalise'][0]->personaliseEmailAddress }}"
                   name="emailAddress" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="input_country" id="label_input_country">
              COUNTRY
            </label><br>
            <input list="countryList" id="input_country" value="{{ $data['personalise'][0]->personaliseCountry }}"
                   name="country" class="input-lg form-control-lg">
            <datalist id="countryList">
              @foreach($data['countries'] as $country)
                <option value="{{ $country->resourceCountryName }}">{{ $country->resourceCountryName }}</option>
              @endforeach
            </datalist>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="input_city" id="label_input_city">
              TOWN OR CITY
            </label><br>
            <input type="text" id="input_city" value="{{ $data['personalise'][0]->personaliseCity }}" name="city"
                   class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="input_addressLine" id="label_input_addressLine">
              ADDRESS LINE 1
            </label><br>
            <input type="text" id="input_addressLine" value="{{ $data['personalise'][0]->personaliseAddressLine }}"
                   name="addressLine" class="input-lg form-control-lg">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="input_website" id="label_input_website">
              WEBSITE USER
            </label><br>
            <input type="text" id="input_website" value="{{ $data['personalise'][0]->personaliseWebsite }}"
                   name="website" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_contact_continue">
        <button id="btn_contact_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
    @endsection

    @section('js')
      <script>
          $(document).ready(function () {
              $('#btn_contact_continue').click(function () {
                  var firstName = $('#input_firstName').val();
                  var lastName = $('#input_lastName').val();
                  var mobileNumber = $('#input_mobileNumber').val();
                  var emailAddress = $('#input_emailAddress').val();
                  var country = $('#input_country').val();
                  var city = $('#input_city').val();
                  var addressLine = $('#input_addressLine').val();
                  var website = $('#input_website').val();
                  var sectionId = '{{ Session::get('section_id') }}';
                  $.ajax({
                      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                      url: '/temp_info_save/personalise/review',
                      data: {
                          'firstName': firstName,
                          'lastName': lastName,
                          'mobileNumber': mobileNumber,
                          'emailAddress': emailAddress,
                          'country': country,
                          'city': city,
                          'addressLine': addressLine,
                          'website': website,
                          'section_id': sectionId
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