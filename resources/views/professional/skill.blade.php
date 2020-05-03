@extends('layout.base')

@section('content')
  <div class="container text-center">
    <div id="content-header">
      Show Off! What Are Your Top 5 Professional Skills Relevant to Your New {userJobTitle) Role?
    </div>
    <div id="content-subheader">
      Rate yourself out of 5. Give yourself a 5 if you’re an expert & 1 if you’re a Beginner
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      <div class="row">
        <div class="col-8 row">
          <div class="col-6 form-group">
            <label id="label_input_skillNames">
              SKILL NAME
            </label><br>
            <input list="skills" name="skillName1" id="skillName1" class="form-control" required>
            <datalist id="skills">
              @foreach($data['skills'] as $skill)
                <option value="{{ $skill -> resourceSkillsName }}"></option>
              @endforeach
            </datalist>
            <input list="skills" name="skillName2" id="skillName2" class="form-control" required>
            <input list="skills" name="skillName3" id="skillName3" class="form-control" required>
            <input list="skills" name="skillName4" id="skillName4" class="form-control">
            <input list="skills" name="skillName5" id="skillName5" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label id="label_skillRating">
              SKILL RATING
            </label>
            <input type="number" name="skillRating1" id="skillRating1" class="form-control" required>
            <input type="number" name="skillRating2" id="skillRating2" class="form-control" required>
            <input type="number" name="skillRating3" id="skillRating3" class="form-control" required>
            <input type="number" name="skillRating4" id="skillRating4" class="form-control">
            <input type="number" name="skillRating5" id="skillRating5" class="form-control">
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
              window.location.href = '/personal';
          });
      });
  </script>
@endsection