@extends('layouts.website.main')

@push('styles')
@endpush

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-sm mb-6 dark:bg-slate-800">

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6 ">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-dark-heading">Create Ministry</h1>
            <div class="flex space-x-2">
                <a href=""
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 flex items-center">
                    <span class="iconify mr-2" data-icon="tabler:arrow-left" data-width="18"></span>
                    Back
                </a>
            </div>
        </div>

        <form id="ministry-form" action="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Information Section -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <span class="iconify mr-2 text-blue-800" data-icon="tabler:info-circle" data-width="20"></span>
                    <h2 class="text-lg font-medium text-gray-800 dark:text-gray-300">Basic Information</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-800 focus:border-blue-800  dark:bg-gray-800 dark:text-gray-200">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Status</label>
                        <div class="flex items-center gap-1">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="toggle">
                                <div
                                    class="w-11 h-6 bg-gray-300 peer-checked:bg-blue-600 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all">
                                </div>
                            </label>
                            <span class="text-sm text-gray-700 dark:text-slate-300">Active</span>
                        </div>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Logo -->
                    <div>
                        <label for="logo"
                            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Logo</label>
                        <div class="flex items-start ">
                            <div class="flex-1">
                                <div class="relative border border-gray-300 rounded-md overflow-hidden ">
                                    <input type="file" name="logo" id="logo"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10 ">
                                    <div class="p-2 bg-gray-50 flex items-center justify-center  dark:bg-gray-800 dark:text-gray-200"
                                        id="logo-placeholder">
                                        <span class="iconify text-gray-400 mr-2 dark:text-slate-300"
                                            data-icon="tabler:upload" data-width="18"></span>
                                        <span class="text-sm text-gray-500 dark:text-slate-300">Choose file</span>
                                    </div>
                                </div>
                                <p class="text-gray-500 text-xs mt-1 dark:text-slate-300">JPEG, PNG, JPG, GIF (Max 2MB)</p>
                                @error('logo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-start" id="logo-container">
                                <div class="ml-4  border border-gray-300 rounded-md overflow-hidden hidden"
                                    id="logo-preview-container">
                                    <img src="#" alt="Logo Preview" class=" fl h-24 object-cover" id="logo-preview">
                                </div>
                                <button type="button" id="remove-logo" class="ml-2 text-red-500 text-sm hidden "><span
                                        class="iconify" data-icon="tabler:trash" data-width="16"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <span class="iconify mr-2 text-blue-800" data-icon="tabler:file-text" data-width="20"></span>
                    <h2 class="text-lg font-medium text-gray-800 dark:text-gray-300">Description</h2>
                </div>

                <div>
                    <!-- Quill Editor Container -->
                    <div id="quill-editor"></div>
                    <!-- Hidden input to store Quill content -->
                    <input type="hidden" name="description" id="description-input" value="{{ old('description') }}">
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Contact Information Section -->
            <div>
                <div class="flex items-center mb-4">
                    <span class="iconify mr-2 text-blue-800" data-icon="tabler:address-book" data-width="20"></span>
                    <h2 class="text-lg font-medium text-gray-800 dark:text-gray-300">Contact Information</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="iconify text-gray-400 dark:text-gray-300" data-icon="tabler:mail"
                                    data-width="18"></span>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-800 focus:border-blue-800 dark:bg-gray-800 dark:text-gray-200">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone"
                            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Phone</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="iconify text-gray-400 dark:text-gray-300" data-icon="tabler:phone"
                                    data-width="18"></span>
                            </div>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-800 focus:border-blue-800 dark:bg-gray-800 dark:text-gray-200">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address"
                            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="iconify text-gray-400 dark:text-gray-300" data-icon="tabler:map-pin"
                                    data-width="18"></span>
                            </div>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-800 focus:border-blue-800 dark:bg-gray-800 dark:text-gray-200">
                        </div>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Website -->
                    <div>
                        <label for="website"
                            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">Website</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="iconify text-gray-400 dark:text-gray-300" data-icon="tabler:world"
                                    data-width="18"></span>
                            </div>
                            <input type="url" name="website" id="website" value="{{ old('website') }}"
                                class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-800 focus:border-blue-800 dark:bg-gray-800 dark:text-gray-200"
                                placeholder="https://example.com">
                        </div>
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Form Footer -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-end space-x-3">
                    <button type="button" id="reset-form"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 flex items-center  dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-gray-700">
                        <span class="iconify mr-2 dark:text-gray-300" data-icon="tabler:refresh" data-width="18"></span>
                        Reset
                    </button>
                    <button type="button" id="cancel-form"
                        class="px-4 py-2 bg-none border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 flex items-center dark:text-gray-300 dark:hover:bg-gray-700">
                        <span class="iconify mr-2 dark:text-gray-300" data-icon="tabler:x" data-width="18"></span>
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 flex items-center">
                        <span class="iconify mr-2" data-icon="tabler:device-floppy" data-width="18"></span>
                        Save Ministry
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush
