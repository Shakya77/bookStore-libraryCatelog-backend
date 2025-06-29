<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mt-1">
                    {{ __('Welcome back, :name!', ['name' => Auth::user()->name]) }}
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <button
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors duration-200">
                    <span class="iconify mr-2" data-icon="tabler:plus" data-width="16"></span>
                    {{ __('Add New') }}
                </button>
                <button
                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 font-medium text-sm rounded-lg transition-colors duration-200">
                    <span class="iconify mr-2" data-icon="tabler:download" data-width="16"></span>
                    {{ __('Export') }}
                </button>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Users Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Total Users') }}</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-1">1,234</p>
                        <div class="flex items-center mt-2">
                            <span class="text-green-500 text-sm font-medium">+12%</span>
                            <span
                                class="text-gray-500 dark:text-gray-400 text-sm ml-1">{{ __('from last month') }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/50 rounded-xl">
                        <span class="iconify text-blue-600 dark:text-blue-400" data-icon="tabler:users"
                            data-width="32"></span>
                    </div>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Total Orders') }}</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-1">567</p>
                        <div class="flex items-center mt-2">
                            <span class="text-green-500 text-sm font-medium">+8%</span>
                            <span
                                class="text-gray-500 dark:text-gray-400 text-sm ml-1">{{ __('from last month') }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-green-100 dark:bg-green-900/50 rounded-xl">
                        <span class="iconify text-green-600 dark:text-green-400" data-icon="tabler:shopping-cart"
                            data-width="32"></span>
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Products') }}</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-1">89</p>
                        <div class="flex items-center mt-2">
                            <span class="text-yellow-500 text-sm font-medium">+3%</span>
                            <span
                                class="text-gray-500 dark:text-gray-400 text-sm ml-1">{{ __('from last month') }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-900/50 rounded-xl">
                        <span class="iconify text-yellow-600 dark:text-yellow-400" data-icon="tabler:package"
                            data-width="32"></span>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Revenue') }}</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-1">$12,345</p>
                        <div class="flex items-center mt-2">
                            <span class="text-green-500 text-sm font-medium">+15%</span>
                            <span
                                class="text-gray-500 dark:text-gray-400 text-sm ml-1">{{ __('from last month') }}</span>
                        </div>
                    </div>
                    <div class="p-3 bg-purple-100 dark:bg-purple-900/50 rounded-xl">
                        <span class="iconify text-purple-600 dark:text-purple-400" data-icon="tabler:currency-dollar"
                            data-width="32"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Analytics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Quick Actions') }}</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <button onclick="openModal('addUserModal')"
                            class="flex items-center w-full p-3 bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition-colors duration-200">
                            <span class="iconify text-blue-600 dark:text-blue-400 mr-3" data-icon="tabler:user-plus"
                                data-width="20"></span>
                            <span
                                class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Add New User') }}</span>
                        </button>

                        <button onclick="openModal('addProductModal')"
                            class="flex items-center w-full p-3 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 rounded-lg transition-colors duration-200">
                            <span class="iconify text-green-600 dark:text-green-400 mr-3" data-icon="tabler:package"
                                data-width="20"></span>
                            <span
                                class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Add Product') }}</span>
                        </button>

                        <button onclick="openModal('generateReportModal')"
                            class="flex items-center w-full p-3 bg-yellow-50 dark:bg-yellow-900/20 hover:bg-yellow-100 dark:hover:bg-yellow-900/30 rounded-lg transition-colors duration-200">
                            <span class="iconify text-yellow-600 dark:text-yellow-400 mr-3" data-icon="tabler:file-text"
                                data-width="20"></span>
                            <span
                                class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Generate Report') }}</span>
                        </button>

                        <button onclick="openModal('settingsModal')"
                            class="flex items-center w-full p-3 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/30 rounded-lg transition-colors duration-200">
                            <span class="iconify text-purple-600 dark:text-purple-400 mr-3" data-icon="tabler:settings"
                                data-width="20"></span>
                            <span
                                class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Settings') }}</span>
                        </button>

                        <button onclick="openModal('backupModal')"
                            class="flex items-center w-full p-3 bg-red-50 dark:bg-red-900/20 hover:bg-red-100 dark:hover:bg-red-900/30 rounded-lg transition-colors duration-200">
                            <span class="iconify text-red-600 dark:text-red-400 mr-3" data-icon="tabler:backup"
                                data-width="20"></span>
                            <span
                                class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ __('Backup Data') }}</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('Top Products') }}</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center text-white font-bold">
                                        {{ $i }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Product
                                            {{ $i }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ rand(50, 200) }}
                                            {{ __('sales') }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        ${{ rand(1000, 5000) }}</p>
                                    <p class="text-xs text-green-500">+{{ rand(5, 25) }}%</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include all modals -->
    @include('modals.quick-actions')

    <!-- JavaScript for Modal Functionality -->
    <script>
        // Modal functionality
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modals = ['addUserModal', 'addProductModal', 'generateReportModal', 'settingsModal',
                'backupModal'
            ];

            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    closeModal(modalId);
                }
            });
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = ['addUserModal', 'addProductModal', 'generateReportModal', 'settingsModal',
                    'backupModal'
                ];
                modals.forEach(modalId => {
                    const modal = document.getElementById(modalId);
                    if (!modal.classList.contains('hidden')) {
                        closeModal(modalId);
                    }
                });
            }
        });

        // Form submissions with AJAX
        $(document).ready(function() {
            // Add User Form
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.prop('disabled', true).html(
                    '<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Creating...'
                );

                $.ajax({
                    url: '/admin/users',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        closeModal('addUserModal');
                        showNotification('User created successfully!', 'success');
                        // Refresh page or update table
                        location.reload();
                    },
                    error: function(xhr) {
                        showNotification('Error creating user. Please try again.', 'error');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            // Add Product Form
            $('#addProductForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.prop('disabled', true).html(
                    '<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Creating...'
                );

                $.ajax({
                    url: '/admin/products',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        closeModal('addProductModal');
                        showNotification('Product created successfully!', 'success');
                        location.reload();
                    },
                    error: function(xhr) {
                        showNotification('Error creating product. Please try again.', 'error');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            // Generate Report Form
            $('#generateReportForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.prop('disabled', true).html(
                    '<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Generating...'
                );

                $.ajax({
                    url: '/admin/reports/generate',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response, status, xhr) {
                        closeModal('generateReportModal');

                        // Create download link
                        const blob = new Blob([response]);
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;

                        // Get filename from response headers
                        const disposition = xhr.getResponseHeader('Content-Disposition');
                        const filename = disposition ? disposition.split('filename=')[1]
                            .replace(/"/g, '') : 'report.pdf';
                        a.download = filename;

                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);

                        showNotification('Report generated successfully!', 'success');
                    },
                    error: function(xhr) {
                        showNotification('Error generating report. Please try again.', 'error');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            // Settings Form
            $('#settingsForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.prop('disabled', true).html(
                    '<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Saving...'
                );

                $.ajax({
                    url: '/admin/settings',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        closeModal('settingsModal');
                        showNotification('Settings saved successfully!', 'success');
                    },
                    error: function(xhr) {
                        showNotification('Error saving settings. Please try again.', 'error');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            // Backup Form
            $('#backupForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();

                submitBtn.prop('disabled', true).html(
                    '<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Backing up...'
                );

                $.ajax({
                    url: '/admin/backup',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        closeModal('backupModal');
                        showNotification('Backup completed successfully!', 'success');
                    },
                    error: function(xhr) {
                        showNotification('Error creating backup. Please try again.', 'error');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            });
        });

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = $(`
                <div class="fixed top-4 right-4 z-50 max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span class="iconify ${type === 'success' ? 'text-green-400' : type === 'error' ? 'text-red-400' : 'text-blue-400'}" 
                                      data-icon="${type === 'success' ? 'tabler:check-circle' : type === 'error' ? 'tabler:x-circle' : 'tabler:info-circle'}" 
                                      data-width="20"></span>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">${message}</p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button class="bg-white dark:bg-gray-800 rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none" onclick="$(this).closest('.fixed').remove()">
                                    <span class="iconify" data-icon="tabler:x" data-width="16"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            $('body').append(notification);

            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.fadeOut(() => notification.remove());
            }, 5000);
        }

        // Image preview for product modal
        $('#product_image').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = `
                        <div class="mt-2">
                            <img src="${e.target.result}" alt="Preview" class="h-20 w-20 object-cover rounded-lg">
                        </div>
                    `;
                    $('#product_image').parent().append(preview);
                };
                reader.readAsDataURL(file);
            }
        });

        // Set default dates for report modal
        $('#generateReportModal').on('show', function() {
            const today = new Date();
            const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());

            $('#start_date').val(lastMonth.toISOString().split('T')[0]);
            $('#end_date').val(today.toISOString().split('T')[0]);
        });
    </script>
</x-app-layout>
