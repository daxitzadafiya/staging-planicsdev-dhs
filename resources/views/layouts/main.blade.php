<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('frontend/assets/img/fav-icon.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>@yield('page-title')</title>
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <style>
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgb(126 126 126 / 50%);
                z-index: 9999999;
                display: none;
            }
            .loader {
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                position: absolute;
            }
        </style>
        @stack('custom-styles')
    </head>
    <body class="py-5 md:py-0">
        @include('includes.header')
        <div class="flex overflow-hidden">
            @include('includes.sidebar')
            <div class="content">
                @include('extra.alert')
                @include('extra.loader')
                @yield('content')
            </div>
        </div>
        <input type="hidden" id="site_url" value="{{ url('/') }}">
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/toastify.min.js') }}"></script>
        <script src="{{ asset('js/lodash.min.js') }}"></script>
        <script src="{{ asset('dist/js/ckeditor-classic.js') }}"></script>
        @stack('custom-scripts')
    </body>
</html>