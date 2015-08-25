<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $pageDesc or Lang::get('defaults.page_desc') }}">
    <title>{{ $pageTitle or Lang::get('defaults.page_title') }} | Website</title>

    <!-- Favicons -->

    {{-- Global CSS --}}
 4  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">

    {{-- Page specific CSS --}}
    @yield('css')

    {{-- Google Analytics enabled only on the production server --}}
    @if(App::environment() === 'production')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-XXXXXXXX-X', 'auto');
            ga('send', 'pageview');
        </script>
    @endif
</head>
<body>
    <header>
        <div class="container">
            @include('includes.header')
        </div>
    </header>

    <main>
        <div class="container">
            @include('flash::message')

            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            @include('includes.footer')
        </div>
    </footer>

    {{-- Global JS --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>

    {{-- Page-specific JS --}}
    @yield('scripts')
</body>
</html>
