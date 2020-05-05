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
            <select list="ratings" name="socialMediaType1" id="socialMediaType1" class="form-control"
                    required>
              @foreach($data['socials'] as $social)
                @if($social->socialName == $data['social'][0]->socialMediaType1)
                  <option selected="selected" value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @else
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endif
              @endforeach
            </select>
            <select list="ratings" name="socialMediaType2" id="socialMediaType2" class="form-control"
                    required>
              @foreach($data['socials'] as $social)
                @if($social->socialName == $data['social'][0]->socialMediaType2)
                  <option selected="selected" value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @else
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endif
              @endforeach
            </select>
            <select list="ratings" name="socialMediaType3" id="socialMediaType3" class="form-control"
                    required>
              @foreach($data['socials'] as $social)
                @if($social->socialName == $data['social'][0]->socialMediaType3)
                  <option selected="selected" value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @else
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endif
              @endforeach
            </select>
            <select list="ratings" name="socialMediaType4" id="socialMediaType4" class="form-control"
                    required>
              @foreach($data['socials'] as $social)
                @if($social->socialName == $data['social'][0]->socialMediaType4)
                  <option selected="selected" value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @else
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endif
              @endforeach
            </select>
            <select list="ratings" name="socialMediaType5" id="socialMediaType5" class="form-control"
                    required>
              @foreach($data['socials'] as $social)
                @if($social->socialName == $data['social'][0]->socialMediaType5)
                  <option selected="selected" value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @else
                  <option value="{{ $social->socialName }}" style="background-image: url('{{ $social->iconPath }}')">{{ $social->socialName }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="col-6 form-group">
            <label id="label_username_link">
              USER NAME OR LINK
            </label>
            <input type="text" name="username_link1" value="{{ $data['social'][0]->socialUsername_Link1 }}" id="username_link1" class="form-control">
            <input type="text" name="username_link2" value="{{ $data['social'][0]->socialUsername_Link2 }}" id="username_link2" class="form-control">
            <input type="text" name="username_link3" value="{{ $data['social'][0]->socialUsername_Link3 }}" id="username_link3" class="form-control">
            <input type="text" name="username_link4" value="{{ $data['social'][0]->socialUsername_Link4 }}" id="username_link4" class="form-control">
            <input type="text" name="username_link5" value="{{ $data['social'][0]->socialUsername_Link5 }}" id="username_link5" class="form-control">
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
        <button id="btn_social_skip" class="btn btn-lg btn-info btn_media" type="button"> SKIP</button>
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
              var mediaType1 = $('#socialMediaType1').val();
              var mediaType2 = $('#socialMediaType2').val();
              var mediaType3 = $('#socialMediaType3').val();
              var mediaType4 = $('#socialMediaType4').val();
              var mediaType5 = $('#socialMediaType5').val();
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