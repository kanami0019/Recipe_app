<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        main {
            height: calc(100vh - 50px);
            min-height: calc(100vh - 50px);
            padding-top: 60px;
        }

        footer {
            height: 50px;
        }

        .bg-home {
            background-color: #1e90ff;
        }
    </style>
</head>

<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        @component('components.flash')
        @endcomponent

        <main class="bg-home d-flex align-items-center w-100 h-100">
            <div class="container">
                <div class="row">
                    <div class="col-11 col-lg-10 jumbotron mx-auto mt-4" style="box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.2)">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        @component('components.footer')
        @endcomponent
    </div>
</body>
