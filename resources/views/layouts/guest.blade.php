<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
    @include('layouts.website.header')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Theme toggler functionality
            const themeToggle = $('#nav_themeToggle');
            const darkIcon = $('.dark-icon');
            const lightIcon = $('.light-icon');

            // Check for saved theme preference or use preferred color scheme
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                $('html').addClass('dark');
                darkIcon.removeClass('hidden');
                lightIcon.addClass('hidden');
            }

            // Toggle theme
            themeToggle.on('click', function() {
                if ($('html').hasClass('dark')) {
                    $('html').removeClass('dark');
                    localStorage.setItem('theme', 'light');
                    darkIcon.addClass('hidden');
                    lightIcon.removeClass('hidden');
                } else {
                    $('html').addClass('dark');
                    localStorage.setItem('theme', 'dark');
                    darkIcon.removeClass('hidden');
                    lightIcon.addClass('hidden');
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
