<!-- Navbar -->
<nav
    class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm fixed top-0 left-0 right-0 z-30">
    <div class="px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Sidebar Toggle Button -->
                <button id="sidebar-toggle"
                    class="p-2.5 rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 mr-4 transition-colors duration-200">
                    <span class="iconify" id="toggle-icon" data-icon="tabler:menu-2" data-width="22"></span>
                </button>

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center">
                            <span
                                class="text-white font-bold text-xl">{{ substr(config('app.name', 'A'), 0, 1) }}</span>
                        </div>
                        <span
                            class="ml-3 text-xl font-semibold text-gray-800 dark:text-gray-200">{{ config('app.name', 'Admin Panel') }}</span>
                    </a>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-3">
                <!-- Theme Toggle -->
                <button id="theme-toggle"
                    class="p-2.5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                    <span class="iconify dark:hidden" data-icon="tabler:sun-filled" data-width="20"></span>
                    <span class="iconify hidden dark:block" data-icon="tabler:moon-filled" data-width="20"></span>
                </button>

                <!-- Notifications -->
                <button
                    class="relative p-2.5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                    <span class="iconify" data-icon="tabler:bell" data-width="20"></span>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="user-dropdown-toggle"
                        class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <img class="w-8 h-8 rounded-full mr-3"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=3b82f6&color=fff"
                            alt="User Avatar">
                        <span class="hidden md:block text-base">{{ Auth::user()->name ?? 'User' }}</span>
                        <span class="iconify ml-2 transition-transform duration-200" id="dropdown-arrow"
                            data-icon="tabler:chevron-down" data-width="18"></span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="user-dropdown-menu"
                        class="hidden absolute right-0 mt-2 w-52 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-2 z-50 border border-gray-200 dark:border-gray-700">
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-base font-medium text-gray-800 dark:text-gray-200">
                                {{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ Auth::user()->email ?? 'user@example.com' }}</p>
                        </div>

                        @if (Route::has('profile.edit'))
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-3 text-base text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="iconify mr-3" data-icon="tabler:user" data-width="18"></span>
                                {{ __('Profile') }}
                            </a>
                        @endif

                        <a href="#"
                            class="flex items-center px-4 py-3 text-base text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="iconify mr-3" data-icon="tabler:settings" data-width="18"></span>
                            {{ __('Settings') }}
                        </a>

                        <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full px-4 py-3 text-base text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                                <span class="iconify mr-3" data-icon="tabler:logout" data-width="18"></span>
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
