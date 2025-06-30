<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Profile Settings') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Manage your account settings and preferences') }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Overview Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl mb-8">
                <div class="p-8">
                    <div class="flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                <span
                                    class="text-white font-bold text-2xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">{{ Auth::user()->email }}</p>
                            <div class="flex items-center mt-3 space-x-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                                    {{ __('Active') }}
                                </span>
                                @if (Auth::user()->hasVerifiedEmail())
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        <span class="iconify mr-1" data-icon="tabler:shield-check"
                                            data-width="14"></span>
                                        {{ __('Verified') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Settings -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profile Information -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="border-b border-gray-200 dark:border-gray-700 px-8 py-6">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                        <span class="iconify text-blue-600 dark:text-blue-400" data-icon="tabler:user"
                                            data-width="20"></span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ __('Profile Information') }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __("Update your account's profile information and email address") }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <!-- Profile Information Form -->
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                                @csrf
                                @method('patch')

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('Full Name') }}
                                        </label>
                                        <div class="relative">
                                            <input id="name" name="name" type="text"
                                                class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                                value="{{ old('name', $user->name) }}" required autofocus
                                                autocomplete="name">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="iconify text-gray-400" data-icon="tabler:user"
                                                    data-width="18"></span>
                                            </div>
                                        </div>
                                        @if ($errors->get('name'))
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                                {{ $errors->get('name')[0] }}</p>
                                        @endif
                                    </div>

                                    <div>
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('Email Address') }}
                                        </label>
                                        <div class="relative">
                                            <input id="email" name="email" type="email"
                                                class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                                value="{{ old('email', $user->email) }}" required
                                                autocomplete="username">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="iconify text-gray-400" data-icon="tabler:mail"
                                                    data-width="18"></span>
                                            </div>
                                        </div>
                                        @if ($errors->get('email'))
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                                {{ $errors->get('email')[0] }}</p>
                                        @endif

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div
                                                class="mt-3 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                                <div class="flex items-center">
                                                    <span class="iconify text-yellow-600 dark:text-yellow-400 mr-2"
                                                        data-icon="tabler:alert-circle" data-width="18"></span>
                                                    <p class="text-sm text-yellow-800 dark:text-yellow-200">
                                                        {{ __('Your email address is unverified.') }}
                                                        <button form="send-verification"
                                                            class="underline text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-200 ml-1">
                                                            {{ __('Click here to re-send the verification email.') }}
                                                        </button>
                                                    </p>
                                                </div>
                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 text-sm text-green-600 dark:text-green-400">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <span class="iconify mr-2" data-icon="tabler:check" data-width="18"></span>
                                        {{ __('Save Changes') }}
                                    </button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                                            class="text-sm text-green-600 dark:text-green-400 flex items-center">
                                            <span class="iconify mr-1" data-icon="tabler:check-circle"
                                                data-width="16"></span>
                                            {{ __('Saved successfully!') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="border-b border-gray-200 dark:border-gray-700 px-8 py-6">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                        <span class="iconify text-green-600 dark:text-green-400"
                                            data-icon="tabler:lock" data-width="20"></span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ __('Update Password') }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Ensure your account is using a long, random password to stay secure') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <!-- Update Password Form -->
                            <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                                @csrf
                                @method('put')

                                <div>
                                    <label for="update_password_current_password"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        {{ __('Current Password') }}
                                    </label>
                                    <div class="relative">
                                        <input id="update_password_current_password" name="current_password"
                                            type="password"
                                            class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                            autocomplete="current-password">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <span class="iconify text-gray-400" data-icon="tabler:lock"
                                                data-width="18"></span>
                                        </div>
                                    </div>
                                    @if ($errors->updatePassword->get('current_password'))
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            {{ $errors->updatePassword->get('current_password')[0] }}</p>
                                    @endif
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="update_password_password"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('New Password') }}
                                        </label>
                                        <div class="relative">
                                            <input id="update_password_password" name="password" type="password"
                                                class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                                autocomplete="new-password">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="iconify text-gray-400" data-icon="tabler:key"
                                                    data-width="18"></span>
                                            </div>
                                        </div>
                                        @if ($errors->updatePassword->get('password'))
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                                {{ $errors->updatePassword->get('password')[0] }}</p>
                                        @endif
                                    </div>

                                    <div>
                                        <label for="update_password_password_confirmation"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            {{ __('Confirm Password') }}
                                        </label>
                                        <div class="relative">
                                            <input id="update_password_password_confirmation"
                                                name="password_confirmation" type="password"
                                                class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                                autocomplete="new-password">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <span class="iconify text-gray-400" data-icon="tabler:key"
                                                    data-width="18"></span>
                                            </div>
                                        </div>
                                        @if ($errors->updatePassword->get('password_confirmation'))
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                                {{ $errors->updatePassword->get('password_confirmation')[0] }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                        <span class="iconify mr-2" data-icon="tabler:shield-check"
                                            data-width="18"></span>
                                        {{ __('Update Password') }}
                                    </button>

                                    @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition
                                            x-init="setTimeout(() => show = false, 3000)"
                                            class="text-sm text-green-600 dark:text-green-400 flex items-center">
                                            <span class="iconify mr-1" data-icon="tabler:check-circle"
                                                data-width="16"></span>
                                            {{ __('Password updated!') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Account Status -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                {{ __('Account Status') }}</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Account Type') }}</span>
                                    <span
                                        class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Standard') }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Member Since') }}</span>
                                    <span
                                        class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->created_at->format('M Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Last Login') }}</span>
                                    <span
                                        class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Today') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                {{ __('Quick Actions') }}</h3>
                            <div class="space-y-3">
                                <button
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    <span class="iconify text-gray-400" data-icon="tabler:download"
                                        data-width="18"></span>
                                    <span>{{ __('Export Data') }}</span>
                                </button>
                                <button
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    <span class="iconify text-gray-400" data-icon="tabler:shield"
                                        data-width="18"></span>
                                    <span>{{ __('Privacy Settings') }}</span>
                                </button>
                                <button
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    <span class="iconify text-gray-400" data-icon="tabler:bell"
                                        data-width="18"></span>
                                    <span>{{ __('Notifications') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border-l-4 border-red-500">
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 bg-red-100 dark:bg-red-900 rounded-lg flex items-center justify-center">
                                        <span class="iconify text-red-600 dark:text-red-400"
                                            data-icon="tabler:alert-triangle" data-width="20"></span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ __('Danger Zone') }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Irreversible actions') }}</p>
                                </div>
                            </div>

                            <!-- Delete User Form -->
                            <div class="space-y-6">
                                <div
                                    class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <span class="iconify text-red-600 dark:text-red-400 mt-0.5 mr-3 flex-shrink-0"
                                            data-icon="tabler:alert-triangle" data-width="18"></span>
                                        <div>
                                            <h4 class="text-sm font-medium text-red-800 dark:text-red-200">
                                                {{ __('Delete Account') }}</h4>
                                            <p class="mt-1 text-sm text-red-700 dark:text-red-300">
                                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                    class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <span class="iconify mr-2" data-icon="tabler:trash" data-width="18"></span>
                                    {{ __('Delete Account') }}
                                </button>

                                <!-- Modal -->
                                <div x-data="{ show: false }"
                                    x-on:open-modal.window="$event.detail == 'confirm-user-deletion' ? show = true : null"
                                    x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
                                    x-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                    style="display: none;">
                                    <div x-show="show" class="fixed inset-0 transform transition-all"
                                        x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                                    </div>

                                    <div x-show="show"
                                        class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-md sm:mx-auto"
                                        x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                                            @csrf
                                            @method('delete')

                                            <div class="text-center mb-6">
                                                <div
                                                    class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 dark:bg-red-900 mb-4">
                                                    <span class="iconify text-red-600 dark:text-red-400"
                                                        data-icon="tabler:alert-triangle" data-width="24"></span>
                                                </div>
                                                <h2
                                                    class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                                    {{ __('Are you sure you want to delete your account?') }}
                                                </h2>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                </p>
                                            </div>

                                            <div class="mb-6">
                                                <label for="password"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    {{ __('Password') }}
                                                </label>
                                                <div class="relative">
                                                    <input id="password" name="password" type="password"
                                                        class="block w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                                                        placeholder="{{ __('Enter your password') }}">
                                                    <div
                                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <span class="iconify text-gray-400" data-icon="tabler:lock"
                                                            data-width="18"></span>
                                                    </div>
                                                </div>
                                                @if ($errors->userDeletion->get('password'))
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                                        {{ $errors->userDeletion->get('password')[0] }}</p>
                                                @endif
                                            </div>

                                            <div class="flex justify-end space-x-4">
                                                <button type="button" x-on:click="show = false"
                                                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 font-medium rounded-lg transition-colors">
                                                    {{ __('Cancel') }}
                                                </button>
                                                <button type="submit"
                                                    class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                    {{ __('Delete Account') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
