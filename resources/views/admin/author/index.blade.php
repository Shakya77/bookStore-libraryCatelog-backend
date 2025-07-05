<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Author Dashboard') }}
                </h2>
            </div>
            <div class="flex items-center space-x-3">
                <button id="addModal"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors duration-200">
                    <span class="iconify mr-2" data-icon="tabler:plus" data-width="16"></span>
                    {{ __('Add New') }}
                </button>
            </div>
        </div>
    </x-slot>

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
                        <label for="product_name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Product Name') }} <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="product_name" name="product_name" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    </div>

                    <!-- Category and Price -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
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
                            <label for="price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
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
                            <label for="sku"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
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
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
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
                <div
                    class="flex items-center justify-end pt-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
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

</x-app-layout>
