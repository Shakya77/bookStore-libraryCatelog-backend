<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"></script>

    <!-- Theme Detection Script (runs before page loads) -->
    <script>
        // Apply theme immediately to prevent flash (using vanilla JavaScript)
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full overflow-x-hidden">
    <!-- Simple Spinner Loader -->
    <div id="page-loader"
        class="fixed inset-0 bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="text-center">
            <!-- Spinner -->
            <div
                class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-gray-300 border-t-blue-600 dark:border-gray-600 dark:border-t-blue-400">
            </div>
            <!-- Loading Text -->
            <p class="mt-4 text-gray-700 dark:text-gray-300 text-lg font-medium">Loading...</p>
        </div>
    </div>

    <!-- Your existing content -->
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 overflow-x-hidden">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main id="main-content" class="transition-all duration-300 ease-in-out pt-16 min-h-screen">
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

    <script src="{{ asset('js/modals.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Your existing sidebar code...
            let sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            function applySidebarState() {
                const sidebar = $('#sidebar');
                const mainContent = $('#main-content');
                const toggleIcon = $('#toggle-icon');

                if (sidebarCollapsed) {
                    sidebar.removeClass('w-72').addClass('w-20');
                    mainContent.removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').addClass('hidden');
                    $('.sidebar-tooltip').removeClass('hidden');
                    $('.sidebar-link').removeClass('justify-start px-4').addClass('justify-center px-3');
                    toggleIcon.attr('data-icon', 'tabler:menu');
                } else {
                    sidebar.removeClass('w-20').addClass('w-72');
                    mainContent.removeClass('pl-20').addClass('pl-72');
                    $('.sidebar-text').removeClass('hidden');
                    $('.sidebar-tooltip').addClass('hidden');
                    $('.sidebar-link').removeClass('justify-center px-3').addClass('justify-start px-4');
                    toggleIcon.attr('data-icon', 'tabler:menu-2');
                }
            }

            applySidebarState();

            $('#sidebar-toggle').click(function() {
                sidebarCollapsed = !sidebarCollapsed;
                localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
                applySidebarState();
            });

            // LOADER FUNCTIONALITY WITH 2 SECOND MINIMUM DURATION
            let loaderStartTime = 0;

            function showLoader() {
                loaderStartTime = Date.now();
                $('#page-loader').removeClass('hidden').addClass('flex');
            }

            function hideLoader() {
                const elapsedTime = Date.now() - loaderStartTime;
                const remainingTime = Math.max(0, 2000 - elapsedTime); // 2000ms = 2 seconds

                setTimeout(function() {
                    $('#page-loader').addClass('hidden').removeClass('flex');
                }, remainingTime);
            }

            // Show loader when clicking on navigation links
            $('a[href]:not([href^="#"]):not([href^="javascript:"]):not([href^="mailto:"]):not([href^="tel:"])').on(
                'click',
                function(e) {
                    if (this.hostname !== window.location.hostname ||
                        e.ctrlKey || e.metaKey || e.which === 2 ||
                        $(this).attr('target') === '_blank') {
                        return;
                    }
                    showLoader();
                });

            // Show loader for form submissions
            $('form').on('submit', function() {
                showLoader();
            });

            // Hide loader when page is fully loaded
            $(window).on('load', function() {
                hideLoader();
            });

            // Show loader on page unload (when navigating away)
            $(window).on('beforeunload', function() {
                showLoader();
            });

            // Hide loader if navigation is cancelled (back button, etc.)
            $(window).on('pageshow', function(event) {
                if (event.originalEvent.persisted) {
                    hideLoader();
                }
            });

            // Fallback: Hide loader after maximum time to prevent stuck loader
            let loaderTimeout;

            function startLoaderTimeout() {
                clearTimeout(loaderTimeout);
                loaderTimeout = setTimeout(function() {
                    $('#page-loader').addClass('hidden').removeClass('flex');
                }, 10000); // Hide after 10 seconds maximum
            }

            // Start timeout when showing loader
            $(document).on('click', 'a[href]:not([href^="#"])', function() {
                startLoaderTimeout();
            });

            // THEME TOGGLE
            $('#theme-toggle').click(function() {
                const html = document.documentElement;

                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            });

            // User dropdown toggle
            $('#user-dropdown-toggle').click(function(e) {
                e.stopPropagation();
                $('#user-dropdown-menu').toggleClass('hidden');
                $('#dropdown-arrow').toggleClass('rotate-180');
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#user-dropdown-toggle, #user-dropdown-menu').length) {
                    $('#user-dropdown-menu').addClass('hidden');
                    $('#dropdown-arrow').removeClass('rotate-180');
                }
            });

            function handleResize() {
                if ($(window).width() < 768) {
                    const sidebar = $('#sidebar');
                    const mainContent = $('#main-content');
                    const toggleIcon = $('#toggle-icon');

                    sidebar.removeClass('w-72').addClass('w-20');
                    mainContent.removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').addClass('hidden');
                    $('.sidebar-tooltip').removeClass('hidden');
                    $('.sidebar-link').removeClass('justify-start px-4').addClass('justify-center px-3');
                    toggleIcon.attr('data-icon', 'tabler:menu');
                } else {
                    applySidebarState();
                }
            }

            $(window).resize(handleResize);
            handleResize();
        });

        // Logout function
        function logout() {
            if (confirm('Are you sure you want to log out?')) {
                $('#page-loader').removeClass('hidden').addClass('flex');
                window.location.href = '/logout';
            }
        }
    </script>

    @stack('scripts')
</body>

</html>
