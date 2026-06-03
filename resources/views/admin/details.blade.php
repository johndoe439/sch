{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shipment Details - {{ $shipment->tracking_number }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">

                <!-- Header Bar -->
                <div class="bg-indigo-600 text-white px-6 py-5 flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Shipment Information</h1>

                    <a href="{{ route('shipments.edit', $shipment->id) }}"
                        class="bg-white text-indigo-600 px-5 py-2.5 rounded-lg hover:bg-indigo-50 font-medium transition">
                        ✏️ Edit Shipment
                    </a>
                </div>

                <div class="p-6 lg:p-8 space-y-8">

                    <!-- Tracking Number -->
                    <div class="text-center bg-gray-50 py-8 rounded-2xl border">
                        <p class="text-sm text-gray-500 uppercase tracking-widest">Tracking Number</p>
                        <p class="text-4xl font-mono font-bold text-indigo-700 mt-2">{{ $shipment->tracking_number }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- Sender -->
                        <div class="bg-white border rounded-2xl p-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-3">Sender Information</h3>
                            <table class="w-full text-sm">
                                <tr>
                                    <td class="py-2.5 text-gray-500 w-1/3">Name:</td>
                                    <td class="font-medium">{{ $shipment->sender_firstname }}
                                        {{ $shipment->sender_lastname }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Country:</td>
                                    <td>{{ $shipment->sender_country }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Receiver -->
                        <div class="bg-white border rounded-2xl p-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-3">Receiver Information</h3>
                            <table class="w-full text-sm">
                                <tr>
                                    <td class="py-2.5 text-gray-500 w-1/3">Name:</td>
                                    <td class="font-medium">{{ $shipment->receiver_name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Email:</td>
                                    <td>{{ $shipment->receiver_email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Phone:</td>
                                    <td>{{ $shipment->receiver_phone }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Country:</td>
                                    <td>{{ $shipment->receiver_country }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500 align-top">Address:</td>
                                    <td class="leading-relaxed">{{ $shipment->receiver_address }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- Package Info -->
                    <div class="bg-white border rounded-2xl p-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-3">Package Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p><strong>Package Name:</strong> {{ $shipment->package_name }}</p>
                                <p class="mt-3"><strong>Amount:</strong> <span
                                        class="text-xl font-semibold text-green-600">${{ number_format($shipment->amount, 2) }}</span>
                                </p>
                            </div>
                            <div>
                                <p><strong>Dispatch Date:</strong> {{ $shipment->dispatch_date->format('d M, Y') }}</p>
                                <p><strong>Expected Delivery:</strong> {{ $shipment->delivery_date->format('d M, Y') }}
                                </p>
                            </div>
                        </div>

                        @if ($shipment->description)
                            <div class="mt-6 pt-6 border-t">
                                <strong>Description:</strong>
                                <p class="mt-2 text-gray-700">{{ $shipment->description }}</p>
                            </div>
                        @endif

                        @if ($shipment->condition_message)
                            <div class="mt-6 pt-6 border-t">
                                <strong>Condition Message:</strong>
                                <p class="mt-2 text-gray-700">{{ $shipment->condition_message }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Status -->
                    <div class="bg-gray-50 border rounded-2xl p-6">
                        <div class="flex flex-wrap items-center gap-10">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Current Status</p>
                                <span
                                    class="inline-flex px-6 py-3 rounded-full text-sm font-semibold
                                    {{ $shipment->status == 'delivered'
                                        ? 'bg-green-100 text-green-700'
                                        : ($shipment->status == 'shipped' || $shipment->status == 'transit'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($shipment->status) }}
                                </span>
                            </div>
                            @if ($shipment->current_location)
                                <div>
                                    <p class="text-gray-500 text-sm mb-1">Current Location</p>
                                    <p class="font-medium text-lg">{{ $shipment->current_location }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Package Images -->
                    @if ($shipment->package_images && count($shipment->package_images) > 0)
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Package Images</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @foreach ($shipment->package_images as $image)
                                    <div class="rounded-2xl overflow-hidden shadow">
                                        <img src="{{ Storage::url($image) }}" class="w-full h-44 object-cover"
                                            alt="Package Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shipment Details - {{ $shipment->tracking_number }}
        </h2>
    </x-slot>

    <!-- Start Main Content -->
    <div
        class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)]
                 group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)]
                 group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition pt-24">

        <div class="max-w-5xl mx-auto">

            <div class="card bg-white shadow-lg rounded-2xl overflow-hidden">

                <!-- Header Bar -->
                <div class="bg-indigo-600 text-white px-6 py-5 flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Shipment Information</h1>

                    <a href="{{ route('shipments.edit', $shipment->id) }}"
                        class="bg-white text-indigo-600 px-5 py-2.5 rounded-lg hover:bg-indigo-50 font-medium transition">
                        ✏️ Edit Shipment
                    </a>
                </div>

                <div class="p-6 lg:p-8 space-y-8">

                    <!-- Tracking Number -->
                    <div class="text-center bg-gray-50 py-8 rounded-2xl border">
                        <p class="text-sm text-gray-500 uppercase tracking-widest">Tracking Number</p>
                        <p class="text-4xl font-mono font-bold text-indigo-700 mt-2">
                            #{{ $shipment->tracking_number }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- Sender -->
                        <div class="bg-white border rounded-2xl p-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-3">Sender Information</h3>
                            <table class="w-full text-sm">
                                <tr>
                                    <td class="py-2.5 text-gray-500 w-1/3">Name:</td>
                                    <td class="font-medium">{{ $shipment->sender_firstname }}
                                        {{ $shipment->sender_lastname }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Country:</td>
                                    <td>{{ $shipment->sender_country }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Receiver -->
                        <div class="bg-white border rounded-2xl p-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-3">Receiver Information</h3>
                            <table class="w-full text-sm">
                                <tr>
                                    <td class="py-2.5 text-gray-500 w-1/3">Name:</td>
                                    <td class="font-medium">{{ $shipment->receiver_name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Email:</td>
                                    <td>{{ $shipment->receiver_email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Phone:</td>
                                    <td>{{ $shipment->receiver_phone }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500">Country:</td>
                                    <td>{{ $shipment->receiver_country }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 text-gray-500 align-top">Address:</td>
                                    <td class="leading-relaxed">{{ $shipment->receiver_address }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- Package Info -->
                    <div class="bg-white border rounded-2xl p-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-3">Package Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p><strong>Package Name:</strong> {{ $shipment->package_name }}</p>
                                <p class="mt-3"><strong>Amount:</strong>
                                    <span
                                        class="text-xl font-semibold text-green-600">${{ number_format($shipment->amount, 2) }}</span>
                                </p>
                            </div>
                            <div>
                                <p><strong>Dispatch Date:</strong> {{ $shipment->dispatch_date->format('d M, Y') }}</p>
                                <p><strong>Expected Delivery:</strong> {{ $shipment->delivery_date->format('d M, Y') }}
                                </p>
                            </div>
                        </div>

                        @if ($shipment->description)
                            <div class="mt-6 pt-6 border-t">
                                <strong>Description:</strong>
                                <p class="mt-2 text-gray-700">{{ $shipment->description }}</p>
                            </div>
                        @endif

                        @if ($shipment->condition_message)
                            <div class="mt-6 pt-6 border-t">
                                <strong>Condition Message:</strong>
                                <p class="mt-2 text-gray-700">{{ $shipment->condition_message }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Status -->
                    <div class="bg-gray-50 border rounded-2xl p-6">
                        <div class="flex flex-wrap items-center gap-10">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Current Status</p>
                                <span
                                    class="inline-flex px-6 py-3 rounded-full text-sm font-semibold
                                    {{ $shipment->status == 'delivered'
                                        ? 'bg-green-100 text-green-700'
                                        : ($shipment->status == 'shipped' || $shipment->status == 'transit'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($shipment->status) }}
                                </span>
                            </div>
                            @if ($shipment->current_location)
                                <div>
                                    <p class="text-gray-500 text-sm mb-1">Current Location</p>
                                    <p class="font-medium text-lg">{{ $shipment->current_location }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Package Images -->
                    @if ($shipment->package_images && count($shipment->package_images) > 0)
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Package Images</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @foreach ($shipment->package_images as $image)
                                    <div class="rounded-2xl overflow-hidden shadow border">
                                        <img src="{{ Storage::url($image) }}"
                                            class="w-full h-[240px] object-contain bg-gray-50 p-2" alt="Package Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
