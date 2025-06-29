<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/dashboard" class="flex items-center">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">A</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ml-10 sm:flex">
                    <a href="/dashboard"
                        class="nav-link active inline-flex items-center px-4 py-2 border-b-2 border-blue-500 text-sm font-medium text-blue-600 dark:text-blue-400 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
                        <span class="iconify mr-2" data-icon="tabler:dashboard" data-width="16"></span>
                        Dashboard
                    </a>
                    <a href="/users"
                        class="nav-link inline-flex items-center px-4 py-2 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                        <span class="iconify mr-2" data-icon="tabler:users" data-width="16"></span>
                        Users
                    </a>
                    <a href="/settings"
                        class="nav-link inline-flex items-center px-4 py-2 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                        <span class="iconify mr-2" data-icon="tabler:settings" data-width="16"></span>
                        Settings
                    </a>
                    <a href="/reports"
                        class="nav-link inline-flex items-center px-4 py-2 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                        <span class="iconify mr-2" data-icon="tabler:chart-bar" data-width="16"></span>
                        Reports
                    </a>
                </div>
            </div>

            <!-- Right Side: Notifications + User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 sm:space-x-4">
                <!-- Theme Toggle -->
                <button id="theme-toggle"
                    class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                    <span class="iconify dark:hidden" data-icon="tabler:sun-filled" data-width="18"></span>
                    <span class="iconify hidden dark:block" data-icon="tabler:moon-filled" data-width="18"></span>
                </button>

                <!-- Notifications -->
                <button
                    class="relative p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                    <span class="iconify" data-icon="tabler:bell" data-width="18"></span>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-dropdown-toggle"
                        class="flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 transition ease-in-out duration-150">
                        <img class="w-8 h-8 rounded-full mr-2"
                            src="https://ui-avatars.com/api/?name=John+Doe&background=3b82f6&color=fff"
                            alt="User Avatar">
                        <div class="text-left">
                            <div class="text-sm font-medium text-gray-800 dark:text-gray-200">John Doe</div>
                        </div>
                        <span class="iconify ml-2 transition-transform duration-200" id="dropdown-arrow"
                            data-icon="tabler:chevron-down" data-width="16"></span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="user-dropdown-menu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-medium text-gray-800 dark:text-gray-200">John Doe</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">john@example.com</p>
                        </div>
                        <a href="/profile"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="iconify mr-2" data-icon="tabler:user" data-width="16"></span>
                            Profile
                        </a>
                        <a href="/account"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="iconify mr-2" data-icon="tabler:user-cog" data-width="16"></span>
                            Account Settings
                        </a>
                        <a href="/help"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="iconify mr-2" data-icon="tabler:help" data-width="16"></span>
                            Help & Support
                        </a>
                        <div class="border-t border-gray-200 dark:border-gray-700"></div>
                        <button onclick="logout()"
                            class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                            <span class="iconify mr-2" data-icon="tabler:logout" data-width="16"></span>
                            Log Out
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button id="mobile-menu-toggle"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <span class="iconify menu-open" data-icon="tabler:menu-2" data-width="24"></span>
                    <span class="iconify menu-close hidden" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden sm:hidden border-t border-gray-200 dark:border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/dashboard"
                class="mobile-nav-link active flex items-center pl-3 pr-4 py-2 border-l-4 border-blue-500 text-base font-medium text-blue-700 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/50 focus:outline-none focus:text-blue-800 dark:focus:text-blue-200 focus:bg-blue-100 dark:focus:bg-blue-900 focus:border-blue-700 dark:focus:border-blue-300 transition duration-150 ease-in-out">
                <span class="iconify mr-3" data-icon="tabler:dashboard" data-width="18"></span>
                Dashboard
            </a>
            <a href="/users"
                class="mobile-nav-link flex items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                <span class="iconify mr-3" data-icon="tabler:users" data-width="18"></span>
                Users
            </a>
            <a href="/settings"
                class="mobile-nav-link flex items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                <span class="iconify mr-3" data-icon="tabler:settings" data-width="18"></span>
                Settings
            </a>
            <a href="/reports"
                class="mobile-nav-link flex items-center pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out">
                <span class="iconify mr-3" data-icon="tabler:chart-bar" data-width="18"></span>
                Reports
            </a>
        </div>

        <!-- Mobile User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                <img class="w-10 h-10 rounded-full"
                    src="https://ui-avatars.com/api/?name=John+Doe&background=3b82f6&color=fff" alt="User Avatar">
                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">John Doe</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">john@example.com</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="/profile"
                    class="flex items-center px-4 py-2 text-base font-medium text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                    <span class="iconify mr-3" data-icon="tabler:user" data-width="18"></span>
                    Profile
                </a>
                <a href="/account"
                    class="flex items-center px-4 py-2 text-base font-medium text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out">
                    <span class="iconify mr-3" data-icon="tabler:user-cog" data-width="18"></span>
                    Account Settings
                </a>
                <button onclick="logout()"
                    class="flex items-center w-full text-left px-4 py-2 text-base font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 focus:outline-none focus:text-red-800 dark:focus:text-red-300 focus:bg-red-50 dark:focus:bg-red-900/20 transition duration-150 ease-in-out">
                    <span class="iconify mr-3" data-icon="tabler:logout" data-width="18"></span>
                    Log Out
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Include Iconify -->
<script src="https://code.iconify.design/3/iconify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Mobile menu toggle
        $('#mobile-menu-toggle').click(function() {
            $('#mobile-menu').toggleClass('hidden');
            $('.menu-open').toggleClass('hidden');
            $('.menu-close').toggleClass('hidden');
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

        // Active navigation highlighting
        const currentPath = window.location.pathname;
        $('.nav-link, .mobile-nav-link').removeClass('active');

        $('.nav-link, .mobile-nav-link').each(function() {
            if ($(this).attr('href') === currentPath) {
                $(this).addClass('active');
            }
        });
    });

    // Logout function
    function logout() {
        if (confirm('Are you sure you want to log out?')) {
            // Replace with your logout logic
            window.location.href = '/logout';
        }
    }
</script>
