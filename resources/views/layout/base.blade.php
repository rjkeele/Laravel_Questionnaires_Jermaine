<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Questionnaires</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height">
  <header id="page_header">
    <h1>Resume <strong>Genius</strong></h1>
  </header>
  <div id="main-container" class="container-fluid">
    <div id="sidebar">
      <div id="sidebar-menu">
        <ul id="menu-list">
          @foreach ($sections as $section)
            <li><a href="/{{ $section -> sectionName }}"><img width="20" height="20" style="background-image: url('{{ $section -> sectionIconPath }}')"></img>{{ $section -> sectionName }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div id="main-content">
      @yield('content')
    </div>
  </div>
</div>
</body>
<script src="{{ asset('/assets/js/main.js') }}"></script>
</html>
