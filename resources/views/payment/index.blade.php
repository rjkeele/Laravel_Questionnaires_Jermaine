@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Secure Checkout for {{ $data['product']->productName }}
    </div>
    <div id="content-subheader">
      {{ $data['product']->productDescription }}
    </div>
    <br><br><br>
    <div id="content-body" class="text-left">
      <div class="form-group">
        <label for="input_cardNumber" id="label_input_cardNumber">
          CARD NUMBER
        </label><br>
        <input type="number" id="input_cardNumber" name="cardNumber" class="input-lg form-control-lg">
      </div>
      <div class="row">
        <div class="col-6 form-group">
          <label for="input_cardHolderName" id="label_input_cardHolderName">
            CARDHOLDER NAME
          </label><br>
          <input type="text" id="input_cardHolderName" name="cardHolderName" class="input-lg form-control-lg">
        </div>
        <div class="col-6 form-group">
          <label for="input_expiryDate" id="label_input_expiryDate">
            EXPIRY DATE
          </label><br>
          <input type="date" id="input_expiryDate" name="expiryDate" class="input-lg form-control-lg">
        </div>
      </div>
      <div class="form-group">
        <label for="input_password" id="label_input_password">
          SET A PASSWORD
        </label><br>
        <input type="password" id="input_password" name="password" class="input-lg form-control-lg">
      </div>
      <br><br>
      <div class="text-center" id="div_payment_continue">
        <button id="btn_payment_continue" class="btn btn-lg btn-success" type="button"> PAY £{{ $data['product']->productPrice }} </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_payment_continue').click(function () {
              var cardNumber = $('#input_cardNumber').val();
              var cardHolderName = $('#input_cardHolderName').val();
              var expiryDate = $('#input_expiryDate').val();
              var password = $('#input_password').val();
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/payment',
                  data: {
                      'cardNumber': cardNumber,
                      'cardHolderName': cardHolderName,
                      'expiryDate': expiryDate,
                      'password': password,
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