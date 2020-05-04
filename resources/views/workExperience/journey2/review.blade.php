@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Great! You've Just Added {{Session::get('journey2Company')}}
    </div>
    <div>
      {{--Do you want to add another school, Employers usually like to see details of two schools you've been to!--}}
      Employers love to see details of your last jobs! <br> You’re read to move on to the next section.
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="text-center" id="div_schoolQualification_continue">
        <button id="btn_journey1Review_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_journey1Review_continue').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/moveToNextSection',
                  data: {
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