@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      When Did Your Start Your Job At {{ Session::get('journey1Company') }}?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-6 row">
          <div class="col-6 form-group">

          </div>
          <div class="col-6 form-group">
            <label for="startMonth">START MONTH</label><br>
            <select class="form-control" id="startMonth" name="startMonth">
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
          </div>
        </div>
        <div class="col-6 row">
          <div class="col-6 form-group">
            <label for="endYear">START YEAR</label><br>
            <select class="form-control" name="startYear" id="startYear">
              @for($i = 2020; $i >= 1950; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="col-6 form-group">

          </div>
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_schoolName_continue">
        <button id="btn_companyStartJob_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_companyStartJob_continue').click(function () {
              var jobStartMonth = $('#startMonth').val();
              var jobStartYear = $('#startYear').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/workExperience/journey1/jobStart',
                  data: {
                      'jobStartMonth': jobStartMonth,
                      'jobStartYear': jobStartYear
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success')
                          window.location.href = '/workExperience/journey1/duty';
                  }
              });
          });
      });
  </script>
@endsection