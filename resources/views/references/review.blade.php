@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Employers Love To Know That You Have Excellent Reference Available
    </div>
    <br>
    <div id="content-body" class="text-left">
      <h4 style="position:relative; left: 10%">REFERENCE 1</h4><br>
      <div class="row">
        <div class="col-1">

        </div>
        <div class="col-2 form-group">
          <label id="label_input_refName1">
            NAME
          </label><br>
          <input type="text" name="mediaType1" id="input_refName1" value="{{ $data['ref'][0]->refName1 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refCompany1">
            COMPANY
          </label><br>
          <input type="text" name="refCompany" id="input_refCompany1" value="{{ $data['ref'][0]->refCompany1 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refJob1">
            JOB TITLE
          </label><br>
          <input type="text" name="refJob" id="input_refJob1" value="{{ $data['ref'][0]->refJob1 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refContact1">
            CONTACT NUMBER
          </label><br>
          <input type="text" name="refContact" id="input_refContact1" value="{{ $data['ref'][0]->refContact1 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refEmail1">
            EMAIL
          </label><br>
          <input type="text" name="refEmail" id="input_refEmail1" value="{{ $data['ref'][0]->refEmail1 }}" class="form-control">
        </div>
      </div>
      <h4 style="position:relative; left: 10%">REFERENCE 2</h4><br>
      <div class="row">
        <div class="col-1">

        </div>
        <div class="col-2 form-group">
          <label id="label_input_refName2">
            NAME
          </label><br>
          <input type="text" name="mediaType1" id="input_refName2" value="{{ $data['ref'][0]->refName2 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refCompany2">
            COMPANY
          </label><br>
          <input type="text" name="refCompany" id="input_refCompany2" value="{{ $data['ref'][0]->refCompany2 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refJob2">
            JOB TITLE
          </label><br>
          <input type="text" name="refJob" id="input_refJob2" value="{{ $data['ref'][0]->refJob2 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refContact2">
            CONTACT NUMBER
          </label><br>
          <input type="text" name="refContact" id="input_refContact2" value="{{ $data['ref'][0]->refContact2 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refEmail2">
            EMAIL
          </label><br>
          <input type="text" name="refEmail" id="input_refEmail2" value="{{ $data['ref'][0]->refEmail2 }}" class="form-control">
        </div>
      </div>
      <h4 style="position:relative; left: 10%">REFERENCE 3</h4><br>
      <div class="row">
        <div class="col-1">

        </div>
        <div class="col-2 form-group">
          <label id="label_input_refName3">
            NAME
          </label><br>
          <input type="text" name="mediaType1" id="input_refName3" value="{{ $data['ref'][0]->refName3 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refCompany3">
            COMPANY
          </label><br>
          <input type="text" name="refCompany" id="input_refCompany3" value="{{ $data['ref'][0]->refCompany3 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refJob3">
            JOB TITLE
          </label><br>
          <input type="text" name="refJob" id="input_refJob3" value="{{ $data['ref'][0]->refJob3 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refContact3">
            CONTACT NUMBER
          </label><br>
          <input type="text" name="refContact" id="input_refContact3" value="{{ $data['ref'][0]->refContact3 }}" class="form-control">
        </div>
        <div class="col-2 form-group">
          <label id="label_input_refEmail3">
            EMAIL
          </label><br>
          <input type="text" name="refEmail" id="input_refEmail3" value="{{ $data['ref'][0]->refEmail3 }}" class="form-control">
        </div>
      </div>
      <br><br>
      <div class="text-center" id="div_reference_continue">
        <button id="btn_reference_skip" class="btn btn-lg btn-info btn_ref" type="button"> SKIP, REFERENCES AVAILABLE ON REQUEST</button>
        <button id="btn_reference_continue" class="btn btn-lg btn-success btn_ref" type="button"> CONTINUE</button>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('.btn_ref').click(function () {
              var sectionId = '{{ Session::get('section_id') }}';
              var refName1 = $('#input_refName1').val();
              var refCompany1 = $('#input_refCompany1').val();
              var refJob1 = $('#input_refJob1').val();
              var refContact1 = $('#input_refContact1').val();
              var refEmail1 = $('#input_refEmail1').val();
              var refName2 = $('#input_refName2').val();
              var refCompany2 = $('#input_refCompany2').val();
              var refJob2 = $('#input_refJob2').val();
              var refContact2 = $('#input_refContact2').val();
              var refEmail2 = $('#input_refEmail2').val();
              var refName3 = $('#input_refName3').val();
              var refCompany3 = $('#input_refCompany3').val();
              var refJob3 = $('#input_refJob3').val();
              var refContact3 = $('#input_refContact3').val();
              var refEmail3 = $('#input_refEmail3').val();
              $.ajax({
                  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                  url: '/temp_info_save/references',
                  data: {
                      'refName1': refName1,
                      'refCompany1': refCompany1,
                      'refJob1': refJob1,
                      'refContact1': refContact1,
                      'refEmail1': refEmail1,
                      'refName2': refName2,
                      'refCompany2': refCompany2,
                      'refJob2': refJob2,
                      'refContact2': refContact2,
                      'refEmail2': refEmail2,
                      'refName3': refName3,
                      'refCompany3': refCompany3,
                      'refJob3': refJob3,
                      'refContact3': refContact3,
                      'refEmail3': refEmail3,
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