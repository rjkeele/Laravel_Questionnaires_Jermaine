@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      Great When Did You Start Studying At {schoolName}?
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-5 row">
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
          <div class="col-6 form-group">
            <label for="startYear">START YEAR</label><br>
            <select class="form-control" name="startYear" id="startYear">
              @for($i = 2020; $i >= 1950; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>
        <div class="col-2 text-center">
          <br>TO
        </div>
        <div class="col-5 row">
          <div class="col-6 form-group">
            <label for="endMonth">END MONTH</label><br>
            <select class="form-control" id="endMonth" name="endMonth">
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
          <div class="col-6 form-group">
            <label for="endYear">END YEAR</label><br>
            <select class="form-control" name="endYear" id="endYear">
              @for($i = 2020; $i >= 1950; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_schoolName_continue">
        <button id="btn_schoolPeriod_continue" class="btn btn-lg btn-success" type="button"> CONTINUE </button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_schoolPeriod_continue').click(function () {
              var startMonth = $('#startMonth').val();
              var startYear = $('#startYear').val();
              var endMonth = $('#endMonth').val();
              var endYear = $('#endYear').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/schoolPeriod',
                  data: {
                      'startMonth': startMonth,
                      'startYear': startYear,
                      'endMonth': endMonth,
                      'endYear': endYear
                  },
                  type: 'post',
                  async: true,
                  success: function (result) {
                      if (result === 'success') {
                          window.location.href = '/education/school/course';
                      }
                  }
              });
          });
      });
  </script>
@endsection