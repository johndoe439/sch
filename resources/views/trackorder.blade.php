<x-guest-layout>

    <main>
        <style>
            .page-title .title {
                font-size: 40px !important;
            }

            .hh-grayBox {
                background-color: #F8F8F8;
                margin-bottom: 20px;
                padding: 35px;
                margin-top: 20px;
            }

            .pt45 {
                padding-top: 45px;
            }

            /* Order Tracking Progress */
            .order-tracking {
                text-align: center;
                width: 20%;
                position: relative;
                display: inline-block;
                margin-right: 10px;
            }

            .order-tracking .is-complete {
                display: block;
                position: relative;
                border-radius: 50%;
                height: 30px;
                width: 30px;
                border: 0px solid #AFAFAF;
                background-color: #f7be16;
                margin: 0 auto;
                transition: background 0.25s linear;
            }

            .order-tracking .is-complete:after {
                display: block;
                position: absolute;
                content: '';
                height: 14px;
                width: 7px;
                top: -2px;
                bottom: 0;
                left: 5px;
                margin: auto 0;
                border: 0px solid #AFAFAF;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
                opacity: 0;
            }

            .order-tracking.completed .is-complete {
                border-color: #27aa80;
                background-color: #27aa80;
            }

            .order-tracking.completed .is-complete:after {
                border-color: #fff;
                border-width: 0 3px 3px 0;
                width: 7px;
                left: 11px;
                opacity: 1;
            }

            .order-tracking p {
                color: #A4A4A4;
                font-size: 10px;
                margin-top: 8px;
                line-height: 18px;
            }

            .order-tracking.completed p {
                color: #000;
            }

            .order-tracking::before {
                content: '';
                display: block;
                height: 3px;
                width: calc(100% - 40px);
                background-color: #f7be16;
                top: 13px;
                position: absolute;
                left: calc(-50% + 20px);
                z-index: 0;
            }

            .order-tracking:first-child::before {
                display: none;
            }

            .order-tracking.completed::before {
                background-color: #27aa80;
            }

            /* Map Styling */
            .tracking-map {
                height: 380px;
                border-radius: 12px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                border: 3px solid #f7be16;
                overflow: hidden;
            }
        </style>

        <section class="page-title" style="background-image: url(images/background/4.jpg);">
            <div class="auto-container">
                <div class="title-outer">
                    <h3 class="title">Package {{ $shipment->tracking_number }}</h3>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>tracking</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Product Details -->
        <section class="product-details">
            <div class="container">
                <div class="row">
                    <!-- LEFT COLUMN - Images + Map -->
                    <div class="col-lg-6 col-xl-6">
                        <!-- Package Images Slider -->
                        <div class="bx-wrapper" style="max-width: 100%;">
                            <div class="bx-viewport"
                                style="width: 100%; overflow: hidden; position: relative; height: 380px;">
                                <div class="bxslider" style="width: auto; position: relative;">
                                    @php
                                        $images = $shipment->package_images ?? [];
                                        if (!is_array($images)) {
                                            $images = is_string($images) ? json_decode($images, true) : [];
                                        }
                                    @endphp

                                    @if (is_array($images) && count($images) > 0)
                                        @foreach ($images as $image)
                                            <div class="slider-content"
                                                style="float: none; list-style: none; position: absolute; width: 100%; z-index: 50;">
                                                <div class="rounded-2xl overflow-hidden shadow border">
                                                    <img src="{{ Storage::url($image) }}"
                                                        class="w-full h-[240px] object-contain bg-gray-50 p-2"
                                                        alt="Package Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="slider-content"
                                            style="float: none; list-style: none; position: absolute; width: 100%; z-index: 50;">
                                            <div class="rounded-2xl overflow-hidden shadow border">
                                                <img src="https://placehold.co/600x400/6b7280/ffffff?text=No+Package+Images+Available"
                                                    class="w-full h-[240px] object-contain bg-gray-50 p-2"
                                                    alt="No Package Image">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="bx-controls"></div>
                        </div>

                        <!-- Dynamic Map -->
                        <div class="mt-5">
                            <h6>Current Location on Map</h6>
                            @php
                                $location = $shipment->current_location ?? 'Unknown';
                                $encoded = urlencode($location);
                            @endphp

                            <div class="tracking-map">
                                <iframe width="100%" height="380"
                                    src="https://maps.google.com/maps?q={{ $encoded }}&amp;hl=en&amp;ie=UTF8&amp;output=embed"
                                    frameborder="0" style="border:0; border-radius: 8px;" allowfullscreen
                                    loading="lazy">
                                </iframe>
                            </div>

                            <p class="text-center text-muted small mt-2">
                                Location: <strong>{{ $location }}</strong>
                            </p>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN - Details -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__top">
                            <h3 class="product-details__title">
                                {{ 'INTERNATIONAL PARCEL' }}
                                <span>#{{ $shipment->tracking_number }}</span>
                            </h3>
                        </div>

                        <div class="product-details__content py-4">
                            <!-- Order Progress -->
                            <div class="row">
                                <div class="col-12 hh-grayBox pt45 pb20">
                                    <div class="row justify-content-between">
                                        <!-- Progress steps (you can adjust colors/statuses) -->
                                        <div
                                            class="order-tracking {{ in_array($shipment->status, ['processing', 'shipped', 'transit', 'delivered']) ? 'completed' : '' }}">
                                            <span class="is-complete"></span>
                                            <p>Processing<br><span></span></p>
                                        </div>
                                        <div
                                            class="order-tracking {{ in_array($shipment->status, ['shipped', 'transit', 'delivered']) ? 'completed' : '' }}">
                                            <span class="is-complete"></span>
                                            <p>Shipped<br><span></span></p>
                                        </div>
                                        <div
                                            class="order-tracking {{ in_array($shipment->status, ['transit', 'delivered']) ? 'completed' : '' }}">
                                            <span class="is-complete"></span>
                                            <p>Transit<br><span></span></p>
                                        </div>
                                        <div
                                            class="order-tracking {{ $shipment->status == 'delivered' ? 'completed' : '' }}">
                                            <span class="is-complete"></span>
                                            <p>Delivered<br><span></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Latest Update -->
                            <div class="row mt-4">
                                <div class="alert alert-success border-start w-100">
                                    <h4>Latest Update</h4>
                                    <span
                                        class="text-sm"><b>{{ $shipment->condition_message ?? 'Your package is currently in transit.' }}</b></span>
                                    <hr>
                                    <strong>{{ ucfirst($shipment->status) }}</strong>
                                </div>
                            </div>

                            <!-- Sender Info -->
                            <div class="row mt-4">
                                <div class="col-sm-12 col-md-12">
                                    <h6>Sender's Information</h6>
                                    <p class="p-2">
                                        <strong>Name:</strong> {{ $shipment->sender_firstname }}
                                        {{ $shipment->sender_lastname }}<br>
                                        <strong>Country:</strong> {{ $shipment->sender_country }}
                                    </p>
                                </div>
                            </div>

                            <!-- Receiver Info -->
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <h6>Receiver Information</h6>
                                    <p class="p-2">
                                        <strong>Name:</strong> {{ $shipment->receiver_name }}<br>
                                        <strong>Address:</strong> {{ $shipment->receiver_address }}<br>
                                        <strong>Phone:</strong> {{ $shipment->receiver_phone }}<br>
                                        <strong>Country:</strong> {{ $shipment->receiver_country }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>
