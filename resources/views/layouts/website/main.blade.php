<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Laravel Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- DataTables Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css" />

    @stack('styles')
</head>

<body class="p-6">


    <div class="flex flex-col w-full">
        @include('layouts.website.header')
        <main class="p-6 dark:bg-gray-900 flex justify-center h-full ">
            <div class="max-w-[1600px] w-full ">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables Scripts -->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>
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
