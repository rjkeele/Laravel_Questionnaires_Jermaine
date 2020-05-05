@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Time for The Very Important Part! Let Employers Know Exactly How to Contact You
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="input_firstName" id="label_input_firstName">
              FIRST NAME
            </label><br>
            <input type="text" id="input_firstName" name="firstName" class="input-lg form-control-lg">
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="input_lastName" id="label_input_lastName">
              LAST NAME
            </label><br>
            <input type="text" id="input_lastName" name="lastName" class="input-lg form-control-lg">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="input_mobileNumber" id="label_input_mobileNumber">
              MOBILE NUMBER
            </label><br>
            <input type="text" id="input_mobileNumber" name="mobileNumber" class="input-lg form-control-lg">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <input type="hidden" id="input_hidden_emailAddress" name="hidden_emailAddress">
            <label for="input_schoolName" id="label_input_schoolName">
              EMAIL ADDRESS
            </label><br>
            <input type="text" id="input_emailAddress" name="emailAddress" class="input-lg form-control-lg">
          </div>
        </div>
      </div>

      <br><br>
      <div class="text-center" id="div_contact_continue">
        <button id="btn_contact_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
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
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/personalise/contact',
                  data: {
                      'firstName': firstName,
                      'lastName': lastName,
                      'mobileNumber': mobileNumber,
                      'emailAddress': emailAddress,
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success')
                          window.location.href = '/personalise/location';
                  }
              });

          });
      });
  </script>
@endsection