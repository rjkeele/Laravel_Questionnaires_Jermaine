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
            <input type="text" name="mediaType1" id="mediaType1" class="form-control" required>
            {{--<datalist id="skills">--}}
              {{--@foreach($data['skills'] as $skill)--}}
                {{--<option value="{{ $skill -> resourceSkillsName }}"></option>--}}
              {{--@endforeach--}}
            {{--</datalist>--}}
            <input type="text" name="mediaType2" id="mediaType2" class="form-control" required>
            <input type="text" name="mediaType3" id="mediaType3" class="form-control" required>
            <input type="text" name="mediaType4" id="mediaType4" class="form-control">
            <input type="text" name="mediaType5" id="mediaType5" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label id="label_username_link">
              SKILL RATING
            </label>
            <input type="text" name="username_link1" id="username_link1" class="form-control" required>
            <input type="text" name="username_link2" id="username_link2" class="form-control" required>
            <input type="text" name="username_link3" id="username_link3" class="form-control" required>
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
        <button id="btn_social_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_social_continue').click(function () {
              // var social = $('#input_social').val();
              window.location.href = '/references';
          });
      });
  </script>
@endsection