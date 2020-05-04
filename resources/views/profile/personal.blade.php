@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Time for Your Personal Summary! Tell Your New Employer Why You Are Perfect For The Job
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-7 form-group">
          {{--<input type="hidden" id="input_hidden_education" name="hidden_education">--}}
          <label for="input_personalSummary" id="label_input_personalSummary">
            PERSONAL SUMMARY - MAX.200 WORDS
          </label><br>
          <textarea rows="5" type="text" id="input_personalSummary" name="personalSummary"
                    class="input-lg"></textarea>
        </div>
        <div class="col-5 form-group">
          <label for="input_personalExample" id="label_input_personalExample">
            <h5>Here is A Great Example</h5>
          </label>
          <div id="example-content" style="border: 1px solid gray;">
            ​Target-oriented Sales Executive with a 15-year sales record. Proven success in both B2B and B2C verticals.
            Grew [Company X]’s client base from 10 to 50 within one year. Increased sales by 40 percent by implementing
            a new lead qualification tool. As a confident networker, brings to the table effective relationships with
            key senior contacts in FTSE 250 organisations.
          </div>
        </div>
      </div>

      <br><br>
      <div class="text-center" id="div_personalSummary_continue">
        <button id="btn_personalSummary_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_personalSummary_continue').click(function () {
              var personalSummary = $('#input_personalSummary').val();
              var sectionId = '{{ Session::get('section_id') }}';
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/profile/personalSummary',
                  data: {
                      'personalSummary': personalSummary,
                      'section_id': sectionId
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      // console.log(result);
                      window.location.href = result;
                  }
              });
          });
      });
  </script>
@endsection