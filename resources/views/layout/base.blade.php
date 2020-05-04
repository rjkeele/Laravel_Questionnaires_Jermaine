<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Questionnaires</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/assets/plugin/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height">
  <header id="page_header">
    <h1>Resume <strong>Genius</strong></h1>
  </header>
  <div id="main-container" class="container-fluid">
    <div class="row">
      <div class="col-3" id="sidebar">
        <div id="sidebar-menu">
          <ul id="menu-list">
            @foreach ($data['sections'] as $section)
              @if($section -> sectionOrder > Session::get('section_order'))
                <div class="cursorDisabled">
                  <li id="sidelist_{{ $section->sectionId }}" data-id="{{ $section->sectionId }}" class="sidelist isDisabled"><a
                        href="{{ $section -> startUrl }}"><img width="20" height="20"
                                                               style="background-image: url('{{ $section -> sectionIconPath }}')"></img>{{ $section -> sectionName }}
                    </a></li>
                </div>

              @else
                <li id="sidelist_{{ $section->sectionId }}" data-id="{{ $section->sectionId }}" class="sidelist"><a
                      href="{{ $section -> startUrl }}"><img width="20" height="20"
                                                             style="background-image: url('{{ $section -> sectionIconPath }}')"></img>{{ $section -> sectionName }}
                  </a></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-8" id="main-content">
        <form action="{{ url('/form/') }}" method="post" id="main-form">
          {{ csrf_field() }}
          @yield('content')
        </form>
      </div>
    </div>
  </div>
</div>
</body>
<script src="{{ asset('/assets/plugin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/main.js') }}"></script>
<script>
    $(document).ready(function () {
        var sectionId = '{{ Session::get('section_id') }}';
        console.log(sectionId);
        $('.sidelist').removeClass('active');
        $('#sidelist_' + sectionId).addClass('active');
        var sectionOrder = '{{ Session::get('section_order') }}';
        $('.sidelist').click(function () {
            var sectionId = $(this).attr('data-id');
            $.ajax({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                url: '/moveToAnotherSection',
                data: {
                    'sectionId': sectionId
                },
                type: 'post',
                async: true,
                success: function (result) {
                    window.location.href = result;
                }
            });
        })
    });
</script>
@yield('js')
</html>
