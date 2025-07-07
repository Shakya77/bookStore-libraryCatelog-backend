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
    <!-- Simple Spinner Loader with Backdrop -->
    <div style="display: none;" id="page-loader">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
            <div class="text-center">
                <!-- Spinner -->
                <div
                    class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-gray-300 border-t-blue-600 dark:border-gray-600 dark:border-t-blue-400">
                </div>
                <!-- Loading Text -->
                <p class="mt-4 text-white text-lg font-medium">Loading...</p>
            </div>
        </div>
    </div>

    <!-- Your existing content -->
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 overflow-x-hidden">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main id="main-content" class="pt-16 min-h-screen">
            <div class="p-8">
                <!-- Page Header -->
                @if (isset($header))
                    <div class="mb-8">{{ $header }}</div>
                @endif

                <!-- Page Content -->
                {{ $slot }}
            </div>
            INFO  Server running on [http://127.0.0.1:8000].  
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Loader control variables
            let loaderActive = false;
            let loaderTimeout = null;

            // Sidebar functionality
            let sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            function applySidebarState() {
                const sidebar = $('#sidebar');
                const mainContent = $('#main-content');
                const toggleIcon = $('#toggle-icon');

                if (sidebarCollapsed) {
                    sidebar.removeClass('w-72').addClass('w-20');
                    $('.sidebar-link').removeClass('justify-start px-4').addClass('justify-start px-3');
                    mainContent.removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').hide();
                    $('.sidebar-tooltip').show();
                    toggleIcon.attr('data-icon', 'tabler:menu');
                } else {
                    sidebar.removeClass('w-20').addClass('w-72');
                    $('.sidebar-link').removeClass('justify-start px-3').addClass('justify-start px-4');
                    mainContent.removeClass('pl-20').addClass('pl-72');
                    $('.sidebar-text').show();
                    $('.sidebar-tooltip').hide();
                    toggleIcon.attr('data-icon', 'tabler:menu-2');
                }
            }

            applySidebarState();

            $('#sidebar-toggle').click(function() {
                sidebarCollapsed = !sidebarCollapsed;
                localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
                applySidebarState();
            });

            // LOADER FUNCTIONALITY WITH BACKDROP - GUARANTEED 2 SECONDS
            function showLoader() {
                if (loaderTimeout) clearTimeout(loaderTimeout);

                loaderActive = true;
                $('#page-loader').show();

                loaderTimeout = setTimeout(() => {
                    loaderActive = false;
                    $('#page-loader').hide();
                }, 2000);
            }

            // Expose triggerLoader globally as a wrapper over showLoader()
            window.triggerLoader = function() {
                console.log('Manual loader trigger');
                showLoader();
            };

            // Function to force hide loader (only if not active)
            function hideLoaderIfNotActive() {
                if (!loaderActive) {
                    $('#page-loader').hide();
                }
            }

            // Show loader when clicking on navigation links
            $('a[href]:not([href^="#"]):not([href^="javascript:"]):not([href^="mailto:"]):not([href^="tel:"])').on(
                'click',
                function(e) {
                    // Skip if it's an external link, new tab, or special key is pressed
                    if (this.hostname !== window.location.hostname ||
                        e.ctrlKey || e.metaKey || e.which === 2 ||
                        $(this).attr('target') === '_blank') {
                        return;
                    }

                    console.log('Navigation link clicked, showing loader');
                    showLoader();
                });

            // Show loader for form submissions
            $('form').on('submit', function() {
                console.log('Form submitted, showing loader');
                showLoader();
            });

            // Only hide loader on page load if it's not actively showing
            $(window).on('load', function() {
                console.log('Page loaded, checking if loader should hide');
                hideLoaderIfNotActive();
            });

            // Handle back/forward navigation
            $(window).on('pageshow', function(event) {
                if (event.originalEvent.persisted) {
                    console.log('Page shown from cache, checking if loader should hide');
                    hideLoaderIfNotActive();
                }
            });

            // Show loader immediately on page unload
            $(window).on('beforeunload', function() {
                // Don't use the timed function here, just show immediately
                $('#page-loader').show();
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

            // User dropdown toggle using jQuery show/hide
            $('#user-dropdown-toggle').click(function(e) {
                e.stopPropagation();
                $('#user-dropdown-menu').toggle();
                $('#dropdown-arrow').toggleClass('rotate-180');
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#user-dropdown-toggle, #user-dropdown-menu').length) {
                    $('#user-dropdown-menu').hide();
                    $('#dropdown-arrow').removeClass('rotate-180');
                }
            });

            // Responsive sidebar handling
            function handleResize() {
                if ($(window).width() < 768) {
                    const sidebar = $('#sidebar');
                    const mainContent = $('#main-content');
                    const toggleIcon = $('#toggle-icon');

                    sidebar.removeClass('w-72').addClass('w-20');
                    mainContent.removeClass('pl-72').addClass('pl-20');
                    $('.sidebar-text').hide();
                    $('.sidebar-tooltip').show();
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
                // Show loader and navigate after a brief delay
                $('#page-loader').show();
                setTimeout(function() {
                    window.location.href = '/logout';
                }, 100);
            }
        }

        // Manual loader trigger function for testing
        function triggerLoader() {
            console.log('Manual loader trigger');
            let loaderTimeout = null;

            if (loaderTimeout) {
                clearTimeout(loaderTimeout);
            }

            $('#page-loader').show();
            console.log('Manual loader shown at:', new Date().toLocaleTimeString());

            loaderTimeout = setTimeout(function() {
                $('#page-loader').hide();
                console.log('Manual loader hidden at:', new Date().toLocaleTimeString());
            }, 2000);
        }

        window.triggerLoader = function() {
            console.log('Manual loader trigger');

            // Use the global loaderTimeout variable
            if (loaderTimeout) {
                clearTimeout(loaderTimeout);
            }

            $('#page-loader').show();
            console.log('Manual loader shown at:', new Date().toLocaleTimeString());

            loaderTimeout = setTimeout(function() {
                $('#page-loader').hide();
                console.log('Manual loader hidden at:', new Date().toLocaleTimeString());
            }, 2000);
        };
    </script>

    @stack('scripts')
</body>

</html>
