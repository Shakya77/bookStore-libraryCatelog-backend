<!-- Add New User Modal -->
<div id="addUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                    <span class="iconify mr-2 text-blue-600 dark:text-blue-400" data-icon="tabler:user-plus"
                        data-width="24"></span>
                    {{ __('Add New User') }}
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    onclick="closeModal('addUserModal')">
                    <span class="iconify" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="addUserForm" class="mt-6 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('First Name') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="first_name" name="first_name" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Last Name') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="last_name" name="last_name" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Email Address') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Phone Number') }}
                    </label>
                    <input type="tel" id="phone" name="phone"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Role') }} <span class="text-red-500">*</span>
                    </label>
                    <select id="role" name="role" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <option value="">{{ __('Select Role') }}</option>
                        <option value="admin">{{ __('Administrator') }}</option>
                        <option value="manager">{{ __('Manager') }}</option>
                        <option value="user">{{ __('User') }}</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Password') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Confirm Password') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>
                </div>

                <!-- Send Welcome Email -->
                <div class="flex items-center">
                    <input type="checkbox" id="send_welcome_email" name="send_welcome_email" checked
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="send_welcome_email" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                        {{ __('Send welcome email to user') }}
                    </label>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button type="button" onclick="closeModal('addUserModal')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="addUserForm"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="iconify mr-2" data-icon="tabler:user-plus" data-width="16"></span>
                    {{ __('Create User') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                    <span class="iconify mr-2 text-green-600 dark:text-green-400" data-icon="tabler:package"
                        data-width="24"></span>
                    {{ __('Add New Product') }}
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    onclick="closeModal('addProductModal')">
                    <span class="iconify" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="addProductForm" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                <!-- Product Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Product Image') }}
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="product_image"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <span class="iconify mb-2 text-gray-400" data-icon="tabler:cloud-upload"
                                    data-width="32"></span>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">{{ __('Click to upload') }}</span>
                                    {{ __('or drag and drop') }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 2MB)</p>
                            </div>
                            <input id="product_image" name="product_image" type="file" class="hidden"
                                accept="image/*">
                        </label>
                    </div>
                </div>

                <!-- Product Name -->
                <div>
                    <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Product Name') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="product_name" name="product_name" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <!-- Category and Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Category') }} <span class="text-red-500">*</span>
                        </label>
                        <select id="category" name="category" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <option value="">{{ __('Select Category') }}</option>
                            <option value="electronics">{{ __('Electronics') }}</option>
                            <option value="clothing">{{ __('Clothing') }}</option>
                            <option value="books">{{ __('Books') }}</option>
                            <option value="home">{{ __('Home & Garden') }}</option>
                            <option value="sports">{{ __('Sports') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Price') }} <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500 dark:text-gray-400">$</span>
                            <input type="number" id="price" name="price" step="0.01" min="0"
                                required
                                class="w-full pl-8 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        </div>
                    </div>
                </div>

                <!-- SKU and Stock -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('SKU') }}
                        </label>
                        <input type="text" id="sku" name="sku"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="stock_quantity"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Stock Quantity') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="stock_quantity" name="stock_quantity" min="0" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Description') }}
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                        placeholder="{{ __('Enter product description...') }}"></textarea>
                </div>

                <!-- Status -->
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" checked
                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                        {{ __('Product is active and available for sale') }}
                    </label>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button type="button" onclick="closeModal('addProductModal')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="addProductForm"
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <span class="iconify mr-2" data-icon="tabler:package" data-width="16"></span>
                    {{ __('Create Product') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Generate Report Modal -->
<div id="generateReportModal"
    class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                    <span class="iconify mr-2 text-yellow-600 dark:text-yellow-400" data-icon="tabler:file-text"
                        data-width="24"></span>
                    {{ __('Generate Report') }}
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    onclick="closeModal('generateReportModal')">
                    <span class="iconify" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="generateReportForm" class="mt-6 space-y-6">
                @csrf
                <!-- Report Type -->
                <div>
                    <label for="report_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Report Type') }} <span class="text-red-500">*</span>
                    </label>
                    <select id="report_type" name="report_type" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <option value="">{{ __('Select Report Type') }}</option>
                        <option value="sales">{{ __('Sales Report') }}</option>
                        <option value="users">{{ __('Users Report') }}</option>
                        <option value="products">{{ __('Products Report') }}</option>
                        <option value="orders">{{ __('Orders Report') }}</option>
                        <option value="inventory">{{ __('Inventory Report') }}</option>
                        <option value="financial">{{ __('Financial Report') }}</option>
                    </select>
                </div>

                <!-- Date Range -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Start Date') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="start_date" name="start_date" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('End Date') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="end_date" name="end_date" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>
                </div>

                <!-- Format -->
                <div>
                    <label for="format" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Export Format') }} <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-3 gap-4">
                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="format" value="pdf"
                                class="text-yellow-600 focus:ring-yellow-500" required>
                            <span class="iconify ml-2 mr-2 text-red-500" data-icon="tabler:file-type-pdf"
                                data-width="20"></span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">PDF</span>
                        </label>
                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="format" value="excel"
                                class="text-yellow-600 focus:ring-yellow-500" required>
                            <span class="iconify ml-2 mr-2 text-green-500" data-icon="tabler:file-type-xls"
                                data-width="20"></span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Excel</span>
                        </label>
                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="format" value="csv"
                                class="text-yellow-600 focus:ring-yellow-500" required>
                            <span class="iconify ml-2 mr-2 text-blue-500" data-icon="tabler:file-type-csv"
                                data-width="20"></span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">CSV</span>
                        </label>
                    </div>
                </div>

                <!-- Filters -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Additional Filters') }}
                    </label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="include_charts"
                                class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Include charts and graphs') }}</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="detailed_breakdown"
                                class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Include detailed breakdown') }}</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="send_email"
                                class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Send report via email') }}</span>
                        </label>
                    </div>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button type="button" onclick="closeModal('generateReportModal')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="generateReportForm"
                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    <span class="iconify mr-2" data-icon="tabler:file-text" data-width="16"></span>
                    {{ __('Generate Report') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div id="settingsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                    <span class="iconify mr-2 text-purple-600 dark:text-purple-400" data-icon="tabler:settings"
                        data-width="24"></span>
                    {{ __('Quick Settings') }}
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    onclick="closeModal('settingsModal')">
                    <span class="iconify" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="settingsForm" class="mt-6 space-y-6">
                @csrf
                <!-- General Settings -->
                <div>
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">{{ __('General Settings') }}
                    </h4>

                    <div class="space-y-4">
                        <!-- Site Name -->
                        <div>
                            <label for="site_name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('Site Name') }}
                            </label>
                            <input type="text" id="site_name" name="site_name" value="{{ config('app.name') }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        </div>

                        <!-- Timezone -->
                        <div>
                            <label for="timezone"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('Timezone') }}
                            </label>
                            <select id="timezone" name="timezone"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                <option value="UTC">UTC</option>
                                <option value="America/New_York">Eastern Time</option>
                                <option value="America/Chicago">Central Time</option>
                                <option value="America/Denver">Mountain Time</option>
                                <option value="America/Los_Angeles">Pacific Time</option>
                            </select>
                        </div>

                        <!-- Currency -->
                        <div>
                            <label for="currency"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('Default Currency') }}
                            </label>
                            <select id="currency" name="currency"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                <option value="USD">USD - US Dollar</option>
                                <option value="EUR">EUR - Euro</option>
                                <option value="GBP">GBP - British Pound</option>
                                <option value="CAD">CAD - Canadian Dollar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Notification Settings') }}</h4>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between">
                            <span
                                class="text-sm text-gray-700 dark:text-gray-300">{{ __('Email notifications for new orders') }}</span>
                            <input type="checkbox" name="email_new_orders" checked
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>

                        <label class="flex items-center justify-between">
                            <span
                                class="text-sm text-gray-700 dark:text-gray-300">{{ __('Email notifications for new users') }}</span>
                            <input type="checkbox" name="email_new_users" checked
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>

                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ __('Low stock alerts') }}</span>
                            <input type="checkbox" name="low_stock_alerts" checked
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>

                        <label class="flex items-center justify-between">
                            <span
                                class="text-sm text-gray-700 dark:text-gray-300">{{ __('Weekly summary reports') }}</span>
                            <input type="checkbox" name="weekly_reports"
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Security Settings') }}</h4>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between">
                            <span
                                class="text-sm text-gray-700 dark:text-gray-300">{{ __('Require two-factor authentication') }}</span>
                            <input type="checkbox" name="require_2fa"
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>

                        <label class="flex items-center justify-between">
                            <span
                                class="text-sm text-gray-700 dark:text-gray-300">{{ __('Auto-logout after inactivity') }}</span>
                            <input type="checkbox" name="auto_logout" checked
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </label>

                        <div>
                            <label for="session_timeout"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('Session Timeout (minutes)') }}
                            </label>
                            <input type="number" id="session_timeout" name="session_timeout" value="30"
                                min="5" max="480"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button type="button" onclick="closeModal('settingsModal')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="settingsForm"
                    class="px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <span class="iconify mr-2" data-icon="tabler:settings" data-width="16"></span>
                    {{ __('Save Settings') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Backup Data Modal -->
<div id="backupModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div
        class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                    <span class="iconify mr-2 text-red-600 dark:text-red-400" data-icon="tabler:backup"
                        data-width="24"></span>
                    {{ __('Backup Data') }}
                </h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                    onclick="closeModal('backupModal')">
                    <span class="iconify" data-icon="tabler:x" data-width="24"></span>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="backupForm" class="mt-6 space-y-6">
                @csrf
                <!-- Backup Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('Backup Type') }} <span class="text-red-500">*</span>
                    </label>
                    <div class="space-y-3">
                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="backup_type" value="full"
                                class="text-red-600 focus:ring-red-500" required>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Full Backup') }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('Complete database and files backup') }}</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="backup_type" value="database"
                                class="text-red-600 focus:ring-red-500" required>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Database Only') }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('Database backup without files') }}</div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="backup_type" value="files"
                                class="text-red-600 focus:ring-red-500" required>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Files Only') }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ __('Application files without database') }}</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Backup Options -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        {{ __('Backup Options') }}
                    </label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="compress_backup" checked
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Compress backup file') }}</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="encrypt_backup"
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Encrypt backup file') }}</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="email_backup"
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <span
                                class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Send backup via email') }}</span>
                        </label>
                    </div>
                </div>

                <!-- Storage Location -->
                <div>
                    <label for="storage_location"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Storage Location') }}
                    </label>
                    <select id="storage_location" name="storage_location"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <option value="local">{{ __('Local Server') }}</option>
                        <option value="s3">{{ __('Amazon S3') }}</option>
                        <option value="dropbox">{{ __('Dropbox') }}</option>
                        <option value="google_drive">{{ __('Google Drive') }}</option>
                    </select>
                </div>

                <!-- Backup Name -->
                <div>
                    <label for="backup_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Backup Name') }}
                    </label>
                    <input type="text" id="backup_name" name="backup_name"
                        value="backup_{{ date('Y_m_d_H_i_s') }}"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>

                <!-- Warning Message -->
                <div
                    class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                    <div class="flex">
                        <span class="iconify text-yellow-400 mr-2 mt-0.5" data-icon="tabler:alert-triangle"
                            data-width="20"></span>
                        <div class="text-sm text-yellow-800 dark:text-yellow-200">
                            <strong>{{ __('Important:') }}</strong>
                            {{ __('Large backups may take several minutes to complete. Please do not close this window during the backup process.') }}
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button type="button" onclick="closeModal('backupModal')"
                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="backupForm"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <span class="iconify mr-2" data-icon="tabler:backup" data-width="16"></span>
                    {{ __('Start Backup') }}
                </button>
            </div>
        </div>
    </div>
</div>
