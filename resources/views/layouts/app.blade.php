<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav style="background-color: #24292e" class="navbar navbar-expand-md navbar-dark sticky-top border-bottom py-1">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg class="pb-1" height="30" width="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 985.333 985.334" style="enable-background:new 0 0 985.333 985.334;" xml:space="preserve">
                        <path d="M868.565,492.8c-4.4,22.101-24,38.2-47.5,39.2c-7.4,0.3-13.7,5.7-15.101,13c-1.5,7.3,2.2,14.7,8.9,17.8   c21.3,10,33.2,32.4,28.7,54.5l-4.2,21c-5.5,27.7-36.101,45-62.9,38.4c-7.5-1.8-15.2-3.2-22.8-4.7c-11.2-2.2-22.4-4.5-33.6-6.7   c-14.801-3-29.601-5.899-44.4-8.899c-17.6-3.5-35.3-7.101-52.9-10.601c-19.699-4-39.399-7.899-59.1-11.899   c-21-4.2-42.1-8.4-63.1-12.7c-21.601-4.3-43.2-8.7-64.7-13c-21.4-4.3-42.7-8.601-64.101-12.9c-20.399-4.1-40.8-8.2-61.199-12.3   c-18.7-3.7-37.3-7.5-56-11.2c-16.2-3.2-32.4-6.5-48.5-9.7c-12.9-2.6-25.8-5.199-38.8-7.8c-8.9-1.8-17.801-3.6-26.7-5.399   c-4.101-0.801-8.2-1.7-12.3-2.5c-0.2,0-0.4-0.101-0.601-0.101c2.2,10.4,1.2,21.5-3.6,31.9c-10.101,21.8-33.601,33.2-56.2,28.8   c-6.7-1.3-14,1.2-16.9,7.4l-9,19.5c-2.899,6.199,0,13.399,5.301,17.699c1,0.801,721.8,333.101,722.999,333.4   c6.7,1.3,14-1.2,16.9-7.4l9-19.5c2.9-6.199,0-13.399-5.3-17.699c-18-14.301-24.601-39.601-14.5-61.4c10.1-21.8,33.6-33.2,56.2-28.8   c6.699,1.3,14-1.2,16.899-7.4l9-19.5c2.9-6.2,0-13.399-5.3-17.7c-18-14.3-24.6-39.6-14.5-61.399s33.6-33.2,56.2-28.8   c6.7,1.3,14-1.2,16.9-7.4l9-19.5c2.899-6.2,0-13.4-5.301-17.7c-18-14.3-24.6-39.6-14.5-61.4c10.101-21.8,33.601-33.199,56.2-28.8   c6.7,1.3,14-1.2,16.9-7.399l9.899-21.601c2.9-6.2,0.2-13.5-6-16.399l-107.699-49.7L868.565,492.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF" />
                        <path d="M9.665,485.9c1.2,0.6,779.3,156.699,780.6,156.699c6.801-0.3,13.4-4.5,14.7-11.1l4.2-21c1.3-6.7-3.1-13.1-9.3-16   c-20.8-9.8-33.101-32.8-28.4-56.4c4.7-23.6,25-40.1,48-41.1c6.8-0.3,13.4-4.5,14.7-11.1l3.1-15.4l1.101-5.7   c1.3-6.7-3.101-13.1-9.3-16c-20.801-9.8-33.101-32.8-28.4-56.399c4.7-23.601,25-40.101,48-41.101c6.8-0.3,13.4-4.5,14.7-11.1   l4.2-21c1.3-6.7-3.101-13.1-9.301-16c-20.8-9.8-33.1-32.8-28.399-56.4c4.7-23.6,25-40.1,48-41.1c6.8-0.3,13.399-4.5,14.7-11.1   l4.699-23.3c1.301-6.7-3-13.2-9.699-14.5c0,0-781.9-156.8-782.7-156.8c-5.8,0-10.9,4.1-12.1,9.9l-4.7,23.3   c-1.3,6.7,3.1,13.1,9.3,16c20.8,9.8,33.1,32.8,28.4,56.4c-4.7,23.6-25,40.1-48,41.1c-6.801,0.3-13.4,4.5-14.7,11.1l-4.2,21   c-1.3,6.7,3.1,13.1,9.3,16c20.8,9.8,33.101,32.8,28.4,56.4c-4.7,23.6-25,40.1-48,41.1c-6.8,0.3-13.4,4.5-14.7,11.1l-4.2,21   c-1.3,6.7,3.101,13.1,9.3,16c20.801,9.8,33.101,32.8,28.4,56.4c-4.7,23.601-25,40.101-48,41.101c-6.8,0.3-13.4,4.5-14.7,11.1   l-4.2,21C-0.935,476.7,3.464,483,9.665,485.9z M676.165,229.6c2.7-13.5,15.9-22.3,29.4-19.6s22.3,15.9,19.6,29.4l-33,164.2   l-20.3,101.2c-2.4,11.9-12.8,20.101-24.5,20.101c-1.601,0-3.3-0.2-4.9-0.5c-13.5-2.7-22.3-15.9-19.6-29.4l22.7-112.9L676.165,229.6   z M225.365,139.1c2.7-13.5,15.9-22.3,29.4-19.6s22.3,15.9,19.6,29.4l-11.4,56.7l-12.899,64.3l-10.4,51.8l-18.5,92.6   c-2.399,11.9-12.8,20.101-24.5,20.101c-1.6,0-3.3-0.2-4.899-0.5c-0.7-0.101-1.4-0.301-2-0.5c-12.4-3.601-20.101-16.101-17.5-28.9   l3.699-18.7l9.7-48.4L225.365,139.1z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF" />
                    </svg>
                    Ticket
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="py-1 nav-link" href="/login/google"><span class="text-white"> Sign in with Google</span></a>
                        </li>
                        @else
                        <a class="py-1 nav-link" href="#" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="white">
                                <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path>
                                <path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>
                            </svg>
                        </a>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="py-1 nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="{{ Auth::user()->avatar }}" height="25px" width="25px" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <h2 class="dropdown-header">{{ Auth::user()->name }}</h2>
                                @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ url('/users') }}">Manage Users</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-3">
            @if (session('status'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        // show the alert
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
        $('.toast').toast('show');
        // popovers
        $('#popover-content').hide();
        $('#popover-button').popover({
            content: $('#popover-content'),
            placement: 'bottom',
            html: true
        });
        $('#popover-button').popover('show');
        $('#popover-button').popover('hide');
        $('#popover-content').show();
    });

    // prevent hold ctrl to select
    $('option').mousedown(function(e) {
        e.preventDefault();
        var originalScrollTop = $(this).parent().scrollTop();
        console.log(originalScrollTop);
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        var self = this;
        $(this).parent().focus();
        setTimeout(function() {
            $(self).parent().scrollTop(originalScrollTop);
        }, 0);
        return false;
    });
    // prevent dropdown menu to autoclose when click
    $('.dropdown-menu').on('click', function(e) {
        $(this).next('.dropdown-menu').toggle();
        e.stopPropagation();
    });
    //edit subject input
    $(document)
        .on("click", ".editButton", function() {
            var section = $(this).closest(".formSection");
            var otherSections = $(".formSection").not(section);
            var inputs = section.find("input");
            section.removeClass("readOnly");
            otherSections.addClass("disabled").find('button').prop("disabled", true);
            oldValues = {};
            inputs.each(function() {
                    oldValues[this.id] = $(this).val();
                })
                .prop("disabled", false);
        })
        .on("click", ".cancelButton", function(e) {
            var section = $(this).closest(".formSection");
            var otherSections = $(".formSection").not(section);
            var inputs = section.find("input");
            section.addClass("readOnly");
            otherSections.removeClass("disabled");
            $('button').prop("disabled", false);
            inputs.each(function() {
                    $(this).val(oldValues[this.id]);
                })
                .prop("disabled", true)
            e.stopPropagation();
            e.preventDefault();
        });

    // Dealing with Input width
    let el = document.querySelector(".input-wrap .input");
    let widthMachine = document.querySelector(".input-wrap .width-plus");
    // disabled select
    $('form').submit(function() {
        $('[disabled]').removeAttr('disabled');
    })
</script>

</html>