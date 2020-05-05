@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      Dashboard 1
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        @foreach($data['templates'] as $template)
          <div class="col-md-6">
            <div class=" div_radio_button text-center" style="width: 90%; margin-bottom: 30px" data-id="{{ $template->templateId }}">
              {{ $template -> templateName }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#div_hidden_btns').show();
          $('.div_radio_button').click(function () {
              var templateId = $(this).attr('data-id');
              $('#div_hidden_btns').css('cursor', 'auto');
              $('.btn_download').removeClass('btn_download');
          });
      });
  </script>
@endsection