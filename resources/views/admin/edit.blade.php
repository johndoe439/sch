<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Shipment - {{ $shipment->tracking_number }}
        </h2>
    </x-slot>

    <!-- Start Main Content -->
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)]
                 group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)]
                 group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition pt-24">

        <div class="max-w-5xl mx-auto">

            <div class="card bg-white shadow-lg rounded-2xl overflow-hidden">

                <form action="{{ route('shipments.update', $shipment->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-8 space-y-12">

                    @csrf
                    @method('PUT')

                    <!-- ==================== SECTION 1 ==================== -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
                            <span class="w-8 h-px bg-indigo-600"></span>
                            Tracking & Sender Information
                        </h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Tracking -->
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tracking Number</label>
                                    <input type="text" name="tracking_number"
                                        value="{{ $shipment->tracking_number }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                        required>
                                </div>
                            </div>

                            <!-- Sender -->
                            <div class="space-y-5">
                                <h4 class="font-medium text-gray-700">Sender Details</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                        <input type="text" name="sender_firstname"
                                            value="{{ $shipment->sender_firstname }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                        <input type="text" name="sender_lastname"
                                            value="{{ $shipment->sender_lastname }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                        <input type="text" name="sender_country"
                                            value="{{ $shipment->sender_country }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==================== SECTION 2 ==================== -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
                            <span class="w-8 h-px bg-indigo-600"></span>
                            Receiver Information
                        </h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" name="receiver_name" value="{{ $shipment->receiver_name }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" name="receiver_email" value="{{ $shipment->receiver_email }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="text" name="receiver_phone" value="{{ $shipment->receiver_phone }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                    <input type="text" name="receiver_country"
                                        value="{{ $shipment->receiver_country }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Address</label>
                                <textarea name="receiver_address" rows="4" class="w-full border border-gray-300 rounded-xl px-5 py-3" required>{{ $shipment->receiver_address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ==================== SECTION 3 ==================== -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
                            <span class="w-8 h-px bg-indigo-600"></span>
                            Package & Status
                        </h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Package Details -->
                            <div class="space-y-5">
                                <h4 class="font-medium text-gray-700">Package Details</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Package Name</label>
                                        <input type="text" name="package_name" value="{{ $shipment->package_name }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Amount (USD)</label>
                                        <input type="number" step="0.01" name="amount"
                                            value="{{ $shipment->amount }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Dispatch
                                            Date</label>
                                        <input type="date" name="dispatch_date"
                                            value="{{ $shipment->dispatch_date?->format('Y-m-d') }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Expected
                                            Delivery</label>
                                        <input type="date" name="delivery_date"
                                            value="{{ $shipment->delivery_date?->format('Y-m-d') }}"
                                            class="w-full border border-gray-300 rounded-xl px-5 py-3" required>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-xl px-5 py-3">{{ $shipment->description }}</textarea>
                                </div>
                            </div>

                            <!-- Status & Condition -->
                            <div class="space-y-5">
                                <h4 class="font-medium text-gray-700">Status & Condition</h4>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Status</label>
                                    <select name="status" class="w-full border border-gray-300 rounded-xl px-5 py-3">
                                        <option value="processing"
                                            {{ $shipment->status == 'processing' ? 'selected' : '' }}>Processing
                                        </option>
                                        <option value="shipped"
                                            {{ $shipment->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="transit"
                                            {{ $shipment->status == 'transit' ? 'selected' : '' }}>In Transit</option>
                                        <option value="delivered"
                                            {{ $shipment->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current
                                        Location</label>
                                    <input type="text" name="current_location"
                                        value="{{ $shipment->current_location }}"
                                        class="w-full border border-gray-300 rounded-xl px-5 py-3">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Condition
                                        Message</label>
                                    <textarea name="condition_message" rows="3" class="w-full border border-gray-300 rounded-xl px-5 py-3">{{ $shipment->condition_message }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==================== SECTION 4 ==================== -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
                            <span class="w-8 h-px bg-indigo-600"></span>
                            Package Images
                        </h3>
                        <input type="file" name="package_images[]" multiple accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                        <p class="text-xs text-gray-500 mt-2">Upload new images (existing images will remain unless
                            replaced).</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-8 border-t">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-2xl font-semibold text-lg transition">
                            💾 Update Shipment
                        </button>
                        {{-- <a href="{{ route('shipments.show', $shipment->id) }}"
                            class="px-8 py-4 border border-gray-300 hover:bg-gray-50 rounded-2xl font-medium transition">
                            Cancel
                        </a> --}}
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
