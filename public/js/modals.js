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
document.addEventListener('click', function (event) {
    const modals = ['addUserModal', 'addProductModal', 'generateReportModal', 'settingsModal', 'backupModal'];

    modals.forEach(modalId => {
        const modal = document.getElementById(modalId);
        if (event.target === modal) {
            closeModal(modalId);
        }
    });
});

// Close modal with Escape key
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        const modals = ['addUserModal', 'addProductModal', 'generateReportModal', 'settingsModal', 'backupModal'];
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (!modal.classList.contains('hidden')) {
                closeModal(modalId);
            }
        });
    }
});

// Wait for jQuery to be loaded
document.addEventListener('DOMContentLoaded', function () {
    // Check if jQuery is loaded
    const $ = window.jQuery; // Declare the jQuery variable
    if (typeof $ !== 'undefined') {
        initializeFormHandlers();
    } else {
        // Wait for jQuery to load
        const checkJQuery = setInterval(function () {
            const $ = window.jQuery; // Declare the jQuery variable
            if (typeof $ !== 'undefined') {
                clearInterval(checkJQuery);
                initializeFormHandlers();
            }
        }, 100);
    }
});

function initializeFormHandlers() {
    // Form submissions with AJAX
    const $ = window.jQuery; // Declare the jQuery variable
    $(document).ready(function () {
        // Add User Form
        $('#addUserForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();

            submitBtn.prop('disabled', true).html('<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Creating...');

            $.ajax({
                url: '/admin/users',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('addUserModal');
                    showNotification('User created successfully!', 'success');
                    location.reload();
                },
                error: function (xhr) {
                    showNotification('Error creating user. Please try again.', 'error');
                },
                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Add Product Form
        $('#addProductForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();

            submitBtn.prop('disabled', true).html('<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Creating...');

            $.ajax({
                url: '/admin/products',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('addProductModal');
                    showNotification('Product created successfully!', 'success');
                    location.reload();
                },
                error: function (xhr) {
                    showNotification('Error creating product. Please try again.', 'error');
                },
                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Generate Report Form
        $('#generateReportForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();

            submitBtn.prop('disabled', true).html('<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Generating...');

            $.ajax({
                url: '/admin/reports/generate',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function (response, status, xhr) {
                    closeModal('generateReportModal');

                    const blob = new Blob([response]);
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;

                    const disposition = xhr.getResponseHeader('Content-Disposition');
                    const filename = disposition ? disposition.split('filename=')[1].replace(/"/g, '') : 'report.pdf';
                    a.download = filename;

                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);

                    showNotification('Report generated successfully!', 'success');
                },
                error: function (xhr) {
                    showNotification('Error generating report. Please try again.', 'error');
                },
                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Settings Form
        $('#settingsForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();

            submitBtn.prop('disabled', true).html('<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Saving...');

            $.ajax({
                url: '/admin/settings',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('settingsModal');
                    showNotification('Settings saved successfully!', 'success');
                },
                error: function (xhr) {
                    showNotification('Error saving settings. Please try again.', 'error');
                },
                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Backup Form
        $('#backupForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();

            submitBtn.prop('disabled', true).html('<span class="iconify animate-spin mr-2" data-icon="tabler:loader" data-width="16"></span>Backing up...');

            $.ajax({
                url: '/admin/backup',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    closeModal('backupModal');
                    showNotification('Backup completed successfully!', 'success');
                },
                error: function (xhr) {
                    showNotification('Error creating backup. Please try again.', 'error');
                },
                complete: function () {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    });
}

// Notification system
function showNotification(message, type = 'info') {
    const $ = window.jQuery; // Declare the jQuery variable
    if (typeof $ === 'undefined') {
        console.error('jQuery is not loaded');
        return;
    }

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