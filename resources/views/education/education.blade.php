@extends('layout.base')

@section('content')
  <div class="container">
    <div id="content-header">
      What's Your Highest Level of Education?
    </div>
    <div id="content-body">
      <div class="radio-button-group-container form-group">
        <input type="hidden" id="input_hidden_education" name="hidden_education">
        @foreach($data['educations'] as $education)
          <label for="education-{{ $education -> resourceEducationId }}"
                 data-id="{{ $education -> resourceEducationId }}" class="label_radio_buttons">
            <input type="radio" name="education" id="education-{{ $education -> resourceEducationId }}"
                   class="input_radio_button" value="{{ $education -> resourceEducationId }}">
            <div class="div_radio_button text-center">
              <img src="{{ $education -> resourceEducationIcon }}" alt="image" height="80" style="margin-bottom: 20px">
              <h6>{{ $education -> resourceEducationName }}</h6>
            </div>
          </label>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.div_radio_button').click(function () {
              var educationId = $(this).parent().attr('data-id');
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url:'/temp_info_save/educationLevel',
                  data: {
                      'level_id': educationId
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          // console.log(result);
                          window.location.href = "/education/school/name";
                      }
                  }
              });
          })
      })
  </script>
@endsection