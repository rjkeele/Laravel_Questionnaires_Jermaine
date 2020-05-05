@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Do You Have a Personal Website That Shows Off Your Professional Skills?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="form-group">
        <label for="input_website" id="label_input_website">
          WEBSITE USER
        </label><br>
        <input type="text" id="input_website" name="website" class="input-lg form-control-lg">
      </div>
    </div>
    <br><br>
    <div class="text-center" id="div_website_continue">
      <button id="btn_website_skip" class="btn btn-lg btn-info btn_website" type="button"> SKIP </button>&nbsp;&nbsp;
      <button id="btn_website_continue" class="btn btn-lg btn-success btn_website" type="button"> CONTINUE </button>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.btn_website').click(function () {
              var elem_id = $(this).attr('id');
              if (elem_id === 'btn_website_skip') {
                  var website = '';
              }
              if (elem_id === 'btn_website_continue') {
                  var website = $('#input_website').val();
              }
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/personalise/website',
                  data: {
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