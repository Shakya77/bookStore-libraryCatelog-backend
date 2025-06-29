<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main id="main-content" class="transition-all duration-300 ease-in-out pt-16 pl-72">
            <div class="p-8">
                <!-- Page Header -->
                @if (isset($header))
                    <div class="mb-8">
                        {{ $header }}
                    </div>
                @endif

                <!-- Page Content -->
                {{ $slot }}
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Include modal JavaScript -->
    <script src="{{ asset('js/modals.js') }}"></script>

    <script>
        $(document).ready(function() {
            let sidebarCollapsed = false;

            // Sidebar toggle functionality
            $('#sidebar-toggle').click(function() {
                const sidebar = $('#sidebar');
                const mainContent = $('#main-content');
                const toggleIcon = $('#toggle-icon');

                if (sidebarCollapsed) {
                    // Expand sidebar
                    sidebar.removeClass('w-20').addClass('w-72');
                    mainContent.removeClass('pl-20').addClass('pl-72');
                    $('.sidebar-text').removeClass('hidden');
                    $('.sidebar-tooltip').addClass('hidden');
                    toggleIcon.attr('data-icon', 'tabler:menu-2');
                    sidebarCollapsed = false;
                } else {
                    // Minimize sidebar (show only icons)
                    sidebar.removeClass('w-72').addClass('w-20');
                    mainContent.removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').addClass('hidden');
                    $('.sidebar-tooltip').removeClass('hidden');
                    toggleIcon.attr('data-icon', 'tabler:menu');
                    sidebarCollapsed = true;
                }
            });

            // User dropdown toggle
            $('#user-dropdown-toggle').click(function(e) {
                e.stopPropagation();
                $('#user-dropdown-menu').toggleClass('hidden');
                $('#dropdown-arrow').toggleClass('rotate-180');
            });

            // Close dropdown when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#user-dropdown-toggle, #user-dropdown-menu').length) {
                    $('#user-dropdown-menu').addClass('hidden');
                    $('#dropdown-arrow').removeClass('rotate-180');
                }
            });

            // Theme toggle
            $('#theme-toggle').click(function() {
                $('html').toggleClass('dark');

                // Save theme preference
                if ($('html').hasClass('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });

            // Load saved theme
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                $('html').addClass('dark');
            }

            // Mobile responsiveness
            function handleResize() {
                if ($(window).width() < 768) {
                    $('#sidebar').addClass('w-20').removeClass('w-72');
                    $('#main-content').removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').addClass('hidden');
                    $('.sidebar-tooltip').removeClass('hidden');
                    sidebarCollapsed = true;
                } else if (!sidebarCollapsed) {
                    $('#sidebar').removeClass('w-20').addClass('w-72');
                    $('#main-content').removeClass('pl-20').addClass('pl-72');
                    $('.sidebar-text').removeClass('hidden');
                    $('.sidebar-tooltip').addClass('hidden');
                }
            }

            $(window).resize(handleResize);
            handleResize(); // Call on load
        });

        // Logout function
        function logout() {
            if (confirm('Are you sure you want to log out?')) {
                window.location.href = '/logout';
            }
        }
    </script>

    @stack('scripts')
</body>

</html>
