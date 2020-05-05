@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Do You Have Any Professional Social Media Profiles That Can Make You Stand Out From The Crown?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-8 row">
          <div class="col-6 form-group">
            <label id="label_input_mediaType">
              SOCIAL MEDIA TYPE
            </label><br>
            @for($i = 1; $i < 6; $i++)
              <select type="text" name="mediaType{{ $i }}" id="mediaType{{ $i }}" class="form-control">
                @foreach($data['socials'] as $social)
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endforeach
              </select>
            @endfor
          </div>
          <div class="col-6 form-group">
            <label id="label_username_link">
              USER NAME OR LINK
            </label>
            <input type="text" name="username_link1" id="username_link1" class="form-control">
            <input type="text" name="username_link2" id="username_link2" class="form-control">
            <input type="text" name="username_link3" id="username_link3" class="form-control">
            <input type="text" name="username_link4" id="username_link4" class="form-control">
            <input type="text" name="username_link5" id="username_link5" class="form-control">
          </div>
          {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}

        </div>
        <div class="col-4 form-group">
          <label for="input_personalExample" id="label_input_personalExample">
            <h5>Here Are Some Good Examples</h5>
          </label>
          <div id="example-content" style="border: 1px solid gray;">
            Active Listening <br> Adaptability <br> Communication <br> Creativity <br> Critical Thinking <br> Customer
            Service
          </div>
        </div>
      </div>

      <br><br>
      <div class="text-center" id="div_social_continue">
        <button id="btn_social_skip" class="btn btn-lg btn-info btn_media" type="button"> SKIP </button>
        <button id="btn_social_continue" class="btn btn-lg btn-success btn_media" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.btn_media').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';
              var mediaType1 = $('#mediaType1').val();
              var mediaType2 = $('#mediaType2').val();
              var mediaType3 = $('#mediaType3').val();
              var mediaType4 = $('#mediaType4').val();
              var mediaType5 = $('#mediaType5').val();
              var username_link1 = $('#username_link1').val();
              var username_link2 = $('#username_link2').val();
              var username_link3 = $('#username_link3').val();
              var username_link4 = $('#username_link4').val();
              var username_link5 = $('#username_link5').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/social',
                  data: {
                      'mediaType1': mediaType1,
                      'mediaType2': mediaType2,
                      'mediaType3': mediaType3,
                      'mediaType4': mediaType4,
                      'mediaType5': mediaType5,
                      'username_link1': username_link1,
                      'username_link2': username_link2,
                      'username_link3': username_link3,
                      'username_link4': username_link4,
                      'username_link5': username_link5,
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