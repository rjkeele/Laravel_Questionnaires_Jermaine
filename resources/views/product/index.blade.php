@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      That’s It {{ Session::get('firstName') }}! We Have Everything We Need to Create The Perfect CV For You. Do You
      Want to Build It
      Yourself Or Should We Write Your CV For You?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center row">
      <div class="radio-button-group-container col-6 form-group text-center">
        <input type="hidden" id="input_hidden_graduate" name="hidden_graduate">
        <label for="graduate" class="label_radio_buttons" data-id="{{ $data['products'][0]->productId }}"
               style="width: 100%;height: auto;margin-right: 35px">
          <input type="radio" name="graduate" id="graduate"
                 class="input_radio_button" value="yes">
          <div class="div_radio_button text-center" style="width: 100%;height: auto">
            <img src="{{ $data['products'][0]->productIconPath }}" alt="image" height="80" style="margin-bottom: 20px">
            <h5>{{ $data['products'][0]->productName }}</h5>
            <p>{{ $data['products'][0]->productDescription }}</p>
            <h5>£{{ $data['products'][0]->productPrice }}</h5>
          </div>
        </label>
      </div>
      <div class="radio-button-group-container col-6 form-group text-center">
        <label for="studying" class="label_radio_buttons" data-id="{{ $data['products'][1]->productId }}"
               style="width: 100%;height: auto;">
          <input type="radio" name="graduate" id="studying"
                 class="input_radio_button" value="no">
          <div class="div_radio_button text-center" style="width: 100%;height: auto;">
            <img src="{{ $data['products'][1]->productIconPath }}" alt="image" height="80" style="margin-bottom: 20px">
            <h5>{{ $data['products'][1]->productName }}</h5>
            <p>{{ $data['products'][1]->productDescription }}</p>
            <h5>£{{ $data['products'][1]->productPrice }}</h5>
          </div>
        </label>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.div_radio_button').click(function () {
              var productId = $(this).parent().attr('data-id');
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/product',
                  data: {
                      'productId': productId,
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