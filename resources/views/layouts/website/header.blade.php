<header
    class="fixed top-0 left-0 right-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo/Brand -->
            <div class="flex-shrink-0">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                    KitabNagar
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <button id="nav_themeToggle"
                    class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                    aria-label="Toggle theme">
                    <span class="dark-icon hidden">
                        <span class="iconify text-gray-600 dark:text-gray-300" data-icon="tabler:moon-filled"
                            data-width="18"></span>
                    </span>
                    <span class="light-icon">
                        <span class="iconify text-gray-600 dark:text-gray-300" data-icon="tabler:sun-filled"
                            data-width="18"></span>
                    </span>
                </button>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium text-sm border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Theme toggle functionality
            const themeToggle = $('#nav_themeToggle');
            const darkIcon = $('.dark-icon');
            const lightIcon = $('.light-icon');

            // Check for saved theme preference
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
@endpush
