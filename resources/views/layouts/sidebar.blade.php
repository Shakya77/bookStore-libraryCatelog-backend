<!-- Sidebar -->
<div id="sidebar"
    class="fixed inset-y-0 left-0 z-20 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 ease-in-out pt-16 overflow-hidden">
    <div class="flex flex-col h-full">
        <!-- Sidebar Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-3 overflow-y-auto overflow-x-hidden">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Dashboard') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:dashboard" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Dashboard') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Dashboard') }}
                </div>
            </a>

            <!-- Users -->
            <a href="{{ route('author') }}"
                class="sidebar-link {{ request()->routeIs('author') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('author') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Users') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:users" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Author') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Author') }}
                </div>
            </a>

            <!-- Products -->
            <a href=""
                class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('products.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Products') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:package" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Products') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Products') }}
                </div>
            </a>

            <!-- Orders -->
            <a href=""
                class="sidebar-link {{ request()->routeIs('orders.*') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('orders.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Orders') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:shopping-cart" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Orders') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Orders') }}
                </div>
            </a>

            <!-- Analytics -->
            <a href=""
                class="sidebar-link {{ request()->routeIs('analytics.*') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('analytics.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Analytics') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:chart-line" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Analytics') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Analytics') }}
                </div>
            </a>

            <!-- Reports -->
            <a href=""
                class="sidebar-link {{ request()->routeIs('reports.*') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('reports.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Reports') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:file-text" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Reports') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Reports') }}
                </div>
            </a>

            <!-- Divider -->
            <div class="border-t border-gray-200 dark:border-gray-700 my-6"></div>

            <!-- Settings -->
            <a href=""
                class="sidebar-link {{ request()->routeIs('settings.*') ? 'active' : '' }} group flex items-center px-4 py-3 text-base font-medium rounded-lg {{ request()->routeIs('settings.*') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/50' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700' }} relative whitespace-nowrap"
                title="{{ __('Settings') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:settings" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Settings') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Settings') }}
                </div>
            </a>

            <!-- Help -->
            <a href="#"
                class="sidebar-link group flex items-center px-4 py-3 text-base font-medium rounded-lg text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 relative whitespace-nowrap"
                title="{{ __('Help') }}">
                <span class="iconify flex-shrink-0" data-icon="tabler:help" data-width="22"></span>
                <span class="sidebar-text ml-4">{{ __('Help') }}</span>
                <div
                    class="sidebar-tooltip hidden absolute left-full ml-3 px-3 py-2 bg-gray-900 dark:bg-gray-700 text-white text-sm rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 whitespace-nowrap z-50 shadow-lg">
                    {{ __('Help') }}
                </div>
            </a>
        </nav>
    </div>
</div>
