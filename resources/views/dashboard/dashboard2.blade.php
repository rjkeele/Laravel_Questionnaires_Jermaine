@extends('layout.base')

@section('content')
  <div class="container text-center" style="width: 80%;min-width: 250px">
    <div id="content-header">
      Dashboard 2
    </div>
    <br><br><br>
    <div id="content-body" class="text-center">
      WE ARE CURRENTLY WORKING ON YOUR NEW CV! <br>
      ONCE IT IS READY YOU WILL RECEIVE AN EMAIL NOTIFICATION.
    </div>
  </div>
@endsection

@section('js')
  <script>
      $(document).ready(function () {
          $('#div_hidden_btns').show();
      });
  </script>
@endsection