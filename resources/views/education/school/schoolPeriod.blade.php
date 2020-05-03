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
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
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
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
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
              // var schoolName = $('#input_schoolName').val();
              window.location.href = '/education/school/course';
          });
      });
  </script>
@endsection