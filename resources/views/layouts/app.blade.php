<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <div class="container pt-5 pb-5">
            @yield('content')
        </div>

        @component('components.footer')
        @endcomponent

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html> 