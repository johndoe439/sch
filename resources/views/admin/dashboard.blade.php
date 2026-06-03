{{-- <x-app-layout>
    <!-- Start Main Content -->
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12 gap-x-4">

            <!-- Dashboard Header -->
            <div class="col-span-full">
                <div class="card bg-heading dark:bg-primary-500 py-7 xl:mb-[104px]">
                    <div class="flex flex-col-reverse sm:flex-row gap-5 justify-between">
                        <div class="shrink-0">
                            <h1
                                class="text-white text-[25px] leading-none font-semibold flex-center gap-2 justify-start">
                                <span class="shrink-0">Good Day, {{ Auth::user()->name }}</span>
                                <span
                                    class="select-none hidden md:inline-block animate-hand-wave origin-[70%_70%]">👋</span>
                            </h1>
                        </div>
                        <div class="shrink-0">
                            <p class="font-spline_sans text-sm !leading-none text-white today">Today is...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="col-span-full">
                    <div
                        class="alert alert-success mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="col-span-full">
                    <div
                        class="alert alert-danger mb-6 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Shipment List Table -->
            <div class="col-span-full">
                <div class="card">
                    <div class="flex-center-between">
                        <h6 class="card-title">Shipment List</h6>
                        <button onclick="showCreateOrderModal()"
                            class="form-input form-select shrink-0 h-11 bg-primary-500 border-none text-white hover:bg-primary-600 transition-colors">
                            Create Shipment
                        </button>
                    </div>

                    <div class="overflow-x-auto scrollbar-table mt-5">
                        <table
                            class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                            <thead class="text-gray-500 dark:text-dark-text">
                                <tr>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two rounded-l-lg">Customer</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two">Tracking ID</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two">Status</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two w-10 rounded-r-lg">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                @forelse($shipments as $shipment)
                                    <tr>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <h6 class="leading-none text-heading font-semibold mb-2">
                                                        {{ $shipment->sender_firstname }}
                                                        {{ $shipment->sender_lastname }}
                                                    </h6>
                                                    <p class="text-xs text-gray-500 dark:text-dark-text-two">
                                                        {{ $shipment->receiver_email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <span class="font-mono">{{ $shipment->tracking_number }}</span>
                                                <button onclick="copyTrackingId('{{ $shipment->tracking_number }}')"
                                                    class="btn-icon btn-primary-icon-light size-7 hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                                                    <i class="ri-file-copy-line text-inherit text-[15px]"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <span
                                                class="badge badge-{{ $shipment->status === 'delivered' ? 'success' : ($shipment->status === 'shipped' || $shipment->status === 'transit' ? 'info' : 'warning') }}-outline b-outline">
                                                {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                                            </span>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <!-- View Button -->
                                                <button onclick="viewShipmentDetails({{ $shipment->id }})"
                                                    class="btn-icon btn-primary-icon-light size-7">
                                                    <i class="ri-eye-line text-inherit text-[13px]"></i>
                                                </button>

                                                <!-- Secure Delete -->
                                                <form action="{{ route('destroy', $shipment->id) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this shipment?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn-icon btn-danger-icon-light size-7">
                                                        <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center p-10 text-gray-400">No shipments found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== CREATE SHIPMENT MODAL ==================== -->
    <div id="createOrderModal"
        class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
        <div
            class="bg-white dark:bg-dark-card w-full max-w-2xl mx-auto rounded-2xl shadow-2xl overflow-hidden max-h-[92vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b dark:border-dark-border p-5 flex-shrink-0">
                <h3 class="text-xl font-semibold text-heading dark:text-white">Create New Shipment</h3>
                <button onclick="hideCreateOrderModal()"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <i class="ri-close-line text-3xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto flex-1" style="max-height: calc(92vh - 140px);">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Your existing form fields remain unchanged -->
                    <!-- ... (Sender, Receiver, Package sections) ... -->
                    <div class="flex justify-end gap-3 mt-8 border-t dark:border-dark-border pt-5">
                        <button type="button" onclick="hideCreateOrderModal()" class="btn btn-light">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Shipment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function copyTrackingId(id) {
            navigator.clipboard.writeText(`#${id}`).then(() => alert('Tracking ID copied!'));
        }

        function viewShipmentDetails(id) {
            window.location.href = `/shipments/${id}`;
        }

        function showCreateOrderModal() {
            document.getElementById('createOrderModal').classList.remove('hidden');
            document.getElementById('createOrderModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function hideCreateOrderModal() {
            document.getElementById('createOrderModal').classList.add('hidden');
            document.getElementById('createOrderModal').classList.remove('flex');
            document.body.style.overflow = 'visible';
        }
    </script>
</x-app-layout> --}}


<x-app-layout>
    <!-- Start Main Content -->
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
        <div class="grid grid-cols-12 gap-x-4">

            <!-- Dashboard Header -->
            <div class="col-span-full">
                <div class="card bg-heading dark:bg-primary-500 py-7 xl:mb-[104px]">
                    <div class="flex flex-col-reverse sm:flex-row gap-5 justify-between">
                        <div class="shrink-0">
                            <h1
                                class="text-white text-[25px] leading-none font-semibold flex-center gap-2 justify-start">
                                <span class="shrink-0">Good Day, {{ Auth::user()->name }}</span>
                                <span
                                    class="select-none hidden md:inline-block animate-hand-wave origin-[70%_70%]">👋</span>
                            </h1>
                        </div>
                        <div class="shrink-0">
                            <p class="font-spline_sans text-sm !leading-none text-white today">Today is...</p>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Error Message -->
            @if (session('error'))
                <div class="col-span-full">
                    <div
                        class="alert alert-danger mb-6 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <div class="col-span-full">
                    <div
                        class="alert alert-success mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="col-span-full">
                    <div
                        class="alert alert-danger mb-6 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Shipment List Table -->
            <div class="col-span-full">
                <div class="card">
                    <div class="flex-center-between">
                        <h6 class="card-title">Shipment List</h6>
                        <button onclick="showCreateOrderModal()"
                            class="form-input form-select shrink-0 h-11 bg-primary-500 border-none text-white hover:bg-primary-600 transition-colors">
                            Create Shipment
                        </button>
                    </div>

                    <div class="overflow-x-auto scrollbar-table mt-5">
                        <table
                            class="table-auto border-collapse w-full whitespace-nowrap text-left text-gray-500 dark:text-dark-text font-medium">
                            <thead class="text-gray-500 dark:text-dark-text">
                                <tr>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two rounded-l-lg">Customer</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two">Tracking ID</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two">Status</th>
                                    <th class="p-6 py-4 bg-primary-200 dark:bg-dark-card-two w-10 rounded-r-lg">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-dark-border-three">
                                @forelse($shipments as $shipment)
                                    <tr>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <h6 class="leading-none text-heading font-semibold mb-2">
                                                        {{ $shipment->sender_firstname }}
                                                        {{ $shipment->sender_lastname }}
                                                    </h6>
                                                    <p class="text-xs text-gray-500 dark:text-dark-text-two">
                                                        {{ $shipment->receiver_email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <span class="font-mono">{{ $shipment->tracking_number }}</span>
                                                <button onclick="copyTrackingId('{{ $shipment->tracking_number }}')"
                                                    class="btn-icon btn-primary-icon-light size-7 hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                                                    <i class="ri-file-copy-line text-inherit text-[15px]"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="p-6 py-4">
                                            <span
                                                class="badge badge-{{ $shipment->status === 'delivered' ? 'success' : ($shipment->status === 'shipped' || $shipment->status === 'transit' ? 'info' : 'warning') }}-outline b-outline">
                                                {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                                            </span>
                                        </td>
                                        <td class="p-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <!-- View Button -->
                                                <button onclick="viewShipmentDetails({{ $shipment->id }})"
                                                    class="btn-icon btn-primary-icon-light size-7">
                                                    <i class="ri-eye-line text-inherit text-[13px]"></i>
                                                </button>

                                                <!-- Secure Delete -->
                                                <form action="{{ route('destroy', $shipment->id) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this shipment?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn-icon btn-danger-icon-light size-7">
                                                        <i class="ri-delete-bin-line text-inherit text-[13px]"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center p-10 text-gray-400">No shipments found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== CREATE SHIPMENT MODAL ==================== -->
    <!-- ==================== CREATE SHIPMENT MODAL ==================== -->
    <div id="createOrderModal"
        class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
        <div
            class="bg-white dark:bg-dark-card w-full max-w-2xl mx-auto rounded-2xl shadow-2xl overflow-hidden max-h-[92vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b dark:border-dark-border p-5 flex-shrink-0">
                <h3 class="text-xl font-semibold text-heading dark:text-white">Create New Shipment</h3>
                <button onclick="hideCreateOrderModal()"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <i class="ri-close-line text-3xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto flex-1" style="max-height: calc(92vh - 140px);">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Sender Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="sender_firstname" class="form-label">Sender First Name</label>
                            <input type="text" name="sender_firstname" id="sender_firstname"
                                class="form-input w-full" placeholder="John" required>
                        </div>
                        <div>
                            <label for="sender_lastname" class="form-label">Sender Last Name</label>
                            <input type="text" name="sender_lastname" id="sender_lastname" class="form-input w-full"
                                placeholder="Doe" required>
                        </div>
                        <div>
                            <label for="sender_country" class="form-label">Sender Country</label>
                            <input type="text" name="sender_country" id="sender_country" class="form-input w-full"
                                value="Nigeria" required>
                        </div>
                    </div>

                    <!-- Receiver Details -->
                    <div class="mt-8">
                        <h6 class="form-label mb-4">Receiver Details</h6>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="receiver_name" class="form-label">Receiver Name</label>
                                <input type="text" name="receiver_name" id="receiver_name" class="form-input w-full"
                                    placeholder="Jane Smith" required>
                            </div>
                            <div>
                                <label for="receiver_email" class="form-label">Receiver Email</label>
                                <input type="email" name="receiver_email" id="receiver_email"
                                    class="form-input w-full" placeholder="receiver@example.com" required>
                            </div>
                            <div>
                                <label for="receiver_phone" class="form-label">Receiver Phone</label>
                                <input type="tel" name="receiver_phone" id="receiver_phone"
                                    class="form-input w-full" placeholder="+234 800 123 4567" required>
                            </div>
                            <div>
                                <label for="receiver_country" class="form-label">Receiver Country</label>
                                <input type="text" name="receiver_country" id="receiver_country"
                                    class="form-input w-full" value="Nigeria" required>
                            </div>
                            <div class="md:col-span-2">
                                <label for="receiver_address" class="form-label">Receiver Address</label>
                                <textarea name="receiver_address" id="receiver_address" rows="3" class="form-input w-full"
                                    placeholder="123 Example Street, Port Harcourt, Nigeria" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Package Details -->
                    <div class="mt-8">
                        <h6 class="form-label mb-4">Package Details</h6>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="package_name" class="form-label">Package Name / Type</label>
                                <input type="text" name="package_name" id="package_name"
                                    class="form-input w-full" placeholder="Electronics" required>
                            </div>
                            <div>
                                <label for="amount" class="form-label">Amount (NGN)</label>
                                <input type="number" name="amount" id="amount" class="form-input w-full"
                                    placeholder="15000" step="0.01" min="0" required>
                            </div>
                            <div>
                                <label for="dispatch_date" class="form-label">Dispatch Date</label>
                                <input type="date" name="dispatch_date" id="dispatch_date"
                                    class="form-input w-full">
                            </div>
                            <div>
                                <label for="delivery_date" class="form-label">Delivery Date</label>
                                <input type="date" name="delivery_date" id="delivery_date"
                                    class="form-input w-full">
                            </div>
                            <div class="md:col-span-2">
                                <label for="description" class="form-label">Description (Optional)</label>
                                <textarea name="description" id="description" rows="3" class="form-input w-full"
                                    placeholder="Fragile items, handle with care"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label for="condition_message" class="form-label">Condition Message (Optional)</label>
                                <textarea name="condition_message" id="condition_message" rows="3" class="form-input w-full"
                                    placeholder="Please sign for delivery"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label for="current_location" class="form-label">Current Location</label>
                                <input type="text" name="current_location" id="current_location"
                                    class="form-input w-full" placeholder="Lagos, Nigeria" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="form-label">Package Images (Multiple Allowed)</label>
                                <input type="file" name="package_image[]" id="package_image" multiple
                                    class="form-input w-full file:cursor-pointer file:border-0 file:py-3 file:px-5 file:rounded-xl file:bg-primary-500 file:text-white hover:file:bg-primary-600 file:text-sm"
                                    accept="image/jpeg,image/png,image/jpg,image/gif">
                                <p class="text-xs text-gray-500 dark:text-dark-text-two mt-2">You can upload up to 5
                                    images (max 2MB each). Press Ctrl/Cmd + Click for multiple selection.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8 border-t dark:border-dark-border pt-5">
                        <button type="button" onclick="hideCreateOrderModal()" class="btn btn-light">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Shipment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function copyTrackingId(id) {
            navigator.clipboard.writeText(`${id}`).then(() => alert('Tracking ID copied!'));
        }

        function viewShipmentDetails(id) {
            window.location.href = `/shipments/${id}`;
        }

        function showCreateOrderModal() {
            document.getElementById('createOrderModal').classList.remove('hidden');
            document.getElementById('createOrderModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function hideCreateOrderModal() {
            document.getElementById('createOrderModal').classList.add('hidden');
            document.getElementById('createOrderModal').classList.remove('flex');
            document.body.style.overflow = 'visible';
        }
    </script>
</x-app-layout>
