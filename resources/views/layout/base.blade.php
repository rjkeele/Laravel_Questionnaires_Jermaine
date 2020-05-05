<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Questionnaires</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/assets/plugin/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugin/fontawesome/js/all.js') }}">
  {{--<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}

  <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height">
  <div id="page_header">
    <h1>Resume <strong>Genius</strong></h1>
  </div>
  <div id="main-container" class="container-fluid">
    <div class="row">
      <div id="sidebar">
        <div id="sidebar-menu">
          <ul id="menu-list">
            @foreach ($data['sections'] as $section)
              @if($section -> sectionOrder < 9)
                @if($section -> sectionOrder >= Session::get('section_order'))
                  <div class="cursorDisabled">
                    <li id="sidelist_{{ $section->sectionId }}" data-id="{{ $section->sectionId }}"
                        class="sidelist isDisabled"><a
                          href="{{ $section -> startUrl }}"><img width="20" height="20"
                                                                 src="{{ $section -> sectionIconPath }}">{{ $section -> sectionName }}
                      </a></li>
                  </div>

                @else
                  <li id="sidelist_{{ $section->sectionId }}" data-id="{{ $section->sectionId }}" class="sidelist"><a
                        href="{{ $section -> startUrl }}"><img width="20" height="20"
                                                               src="{{ $section -> sectionIconPath }}">{{ $section -> sectionName }}
                    </a></li>
                @endif
              @else
                <li style="display: none" id="sidelist_{{ $section->sectionId }}" data-id="{{ $section->sectionId }}" class="sidelist">
                  <a href="{{ $section -> startUrl }}"><img width="20" height="20"
                                                             src="{{ $section -> sectionIconPath }}">{{ $section -> sectionName }}
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </div>
        <div id="div_hidden_btns" style="display: none">
          <button class="btn btn-success btn_download"> Word Doc Download</button>
          <button class="btn btn-primary btn_download" style="background-color: red"> PDF Download</button>
          <button class="btn btn-primary" id="menu-toggle">Menu</button>
          <br><br>
        </div>
        <div class="progress" style="width:80%; margin-left: 10% ">
          <div class="progress-bar progress-bar-striped progress-bar-animated"
               style="width: {{ round((int)Session::get('section_order')*100/11) }}%">
            {{ round((int)Session::get('section_order')*100/11) }}%
          </div>
        </div>
      </div>
      <div id="main-content">
        {{--<form method="post" id="main-form">--}}
        {{--          {{ csrf_field() }}--}}
        @yield('content')
        {{--</form>--}}
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
        var sectionOrder = '{{ Session::get('section_order') }}';
        console.log(sectionId);
        console.log(sectionOrder);
        if (sectionId == 9){
          $('#sidelist_9').show();
        }
        if (sectionId == 10){
            $('#sidelist_10').show();
        }
        if (sectionId == 11){
            $('#sidelist_11').show();
        }
        if (sectionId == 12){
            $('#sidelist_12').show();
        }
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
        });
    });

    $('#menu-toggle').click(function (e) {
        e.preventDefault();
        $('#sidebar').toggleClass('toggled');
        $('#main-content').toggleClass('toggled');
    });
</script>
@yield('js')
</html>
