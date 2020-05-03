@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Employers Love To Know That You Have Excellent Reference Available
    </div>
    <br>
    <div id="content-body" class="text-center">
      <h4>REFERENCE 1</h4>
      <div class="row">
        <div class="col-2 form-group">
          <label id="label_input_refName">
            NAME
          </label><br>
          <input type="text" name="mediaType1" id="input_refName" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refCompany">
            COMPANY
          </label><br>
          <input type="text" name="refCompany" id="input_refCompany" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refJob">
            JOB TITLE
          </label><br>
          <input type="text" name="refJob" id="input_refJob" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refContact">
            CONTACT NUMBER
          </label><br>
          <input type="text" name="refContact" id="input_refContact" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refEmail">
            EMAIL
          </label><br>
          <input type="text" name="refEmail" id="input_refEmail" class="form-control">
        </div>
      </div>

      <br><br>
      <div class="text-center" id="div_reference_continue">
        <button id="btn_reference_continue" class="btn btn-lg btn-success" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#btn_reference_continue').click(function () {
              // var social = $('#input_social').val();
              window.location.href = '/product';
          });
      });
  </script>
@endsection