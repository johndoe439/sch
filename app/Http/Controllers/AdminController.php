<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //



    // public function dashboard()
    // {

    //     if (auth()->check()) {
    //         // Safely access the user's role
    //         $role = auth()->user()->role ?? null;



    //         if ($role === 'admin') {
    //             // Admins stay logged in and see the dashboard

    //             $shipment = Shipment::all();
    //             return view('admin.dashboard', compact('shipments'));
    //         } elseif ($role === 'user') {
    //             // Log out users and redirect to welcome
    //             Auth::logout();
    //             return redirect()->route('welcome');
    //         } else {
    //             // Handle unexpected roles (optional: log out and redirect)
    //             Auth::logout();
    //             return redirect()->route('welcome');
    //         }
    //     }
    //     // return view ('admin.ashboard');
    // }






    // public function details()
    // {
    //     return view('admin.details');
    // }








    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('welcome');
        }

        $role = auth()->user()->role ?? null;

        if ($role === 'admin') {
            $shipments = Shipment::latest()->paginate(10);
            return view('admin.dashboard', compact('shipments'));
        } elseif ($role === 'user') {
            Auth::logout();
            return redirect()->route('welcome');
        }

        Auth::logout();
        return redirect()->route('welcome');
    }



    public function store(Request $request)
    {
        $request->validate([
            'sender_firstname'   => 'required|string|max:255',
            'sender_lastname'    => 'required|string|max:255',
            'receiver_name'      => 'required|string|max:255',
            'receiver_email'     => 'required|email|max:255',
            'receiver_phone'     => 'required|string|max:255',
            'receiver_address'   => 'required|string',
            'package_name'       => 'required|string|max:255',
            'amount'             => 'required|numeric|min:0',
            'dispatch_date'      => 'nullable|date',
            'delivery_date'      => 'nullable|date|after_or_equal:dispatch_date',
            'package_image.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('package_image')) {
            foreach ($request->file('package_image') as $image) {
                $path = $image->store('package-images', 'public');
                $images[] = $path;
            }
        }

        Shipment::create([
            'tracking_number'    => Shipment::generateTrackingNumber(),

            'sender_firstname'   => $request->sender_firstname,
            'sender_lastname'    => $request->sender_lastname,
            'sender_country'     => $request->sender_country ?? 'Nigeria',
            'receiver_name'      => $request->receiver_name,
            'receiver_email'     => $request->receiver_email,
            'receiver_phone'     => $request->receiver_phone,
            'receiver_country'   => $request->receiver_country,
            'receiver_address'   => $request->receiver_address,
            'package_name'       => $request->package_name,
            'description'        => $request->description,
            'condition_message'  => $request->condition_message,
            'amount'             => $request->amount,
            'dispatch_date'      => $request->dispatch_date,
            'delivery_date'      => $request->delivery_date,
            'current_location'   => $request->current_location,
            'package_images'     => json_encode($images),
            'status'             => 'processing',
        ]);

        return redirect()->back()->with('success', 'Shipment created successfully!');
    }


    public function show(Shipment $shipment)
    {
        if (is_string($shipment->package_images)) {
            $shipment->package_images = json_decode($shipment->package_images, true);
        }

        return view('admin.details', compact('shipment'));
    }

    public function destroy(Shipment $shipment)
    {
        try {
            // Delete package images if they exist
            if ($shipment->package_images) {
                $images = is_string($shipment->package_images)
                    ? json_decode($shipment->package_images, true)
                    : $shipment->package_images;

                foreach ((array)$images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $shipment->delete();

            return redirect()->back()->with('success', 'Shipment deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete shipment: ' . $e->getMessage());
        }
    }









    /**
     * Show the form for editing the specified shipment.
     */
    public function edit(Shipment $shipment)
    {
        return view('admin.edit', compact('shipment'));
    }

    /**
     * Update the specified shipment in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'tracking_number'   => 'required|string|unique:shipments,tracking_number,' . $shipment->id,
            'sender_firstname'  => 'required|string|max:255',
            'sender_lastname'   => 'required|string|max:255',
            'sender_country'    => 'required|string|max:255',

            'receiver_name'     => 'required|string|max:255',
            'receiver_email'    => 'required|email|max:255',
            'receiver_phone'    => 'required|string|max:255',
            'receiver_country'  => 'required|string|max:255',
            'receiver_address'  => 'required|string',

            'package_name'      => 'required|string|max:255',
            'description'       => 'nullable|string',
            'condition_message' => 'nullable|string',
            'amount'            => 'required|numeric|min:0',
            'dispatch_date'     => 'required|date',
            'delivery_date'     => 'required|date|after_or_equal:dispatch_date',

            'status'            => 'required|in:processing,shipped,transit,delivered',
            'current_location'  => 'nullable|string|max:255',

            'package_images.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        // Handle new images upload
        if ($request->hasFile('package_images')) {
            $images = $shipment->package_images ?? [];

            foreach ($request->file('package_images') as $image) {
                $path = $image->store('package_images', 'public');
                $images[] = $path;
            }

            $validated['package_images'] = $images;
        }

        // Update the shipment
        $shipment->update($validated);

        return redirect()
            ->route('show', $shipment)
            ->with('success', 'Shipment updated successfully!');
    }
}
