<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function welcome()
    {
        return view('welcome');

    }






    public function about ()
    {
        return view ('about'  );
    }



    public function services ()
    {
        return view ('services'  );
    }



    public function tracking ()
    {
        return view ('tracking'  );
    }



    public function contact ()
    {
        return view ('contact'  );
    }


    public function trackorder ()
    {
        return view ('trackorder'  );
    }



    public function track(Request $request)
    {
        $request->validate([
            'track-id' => 'required|string|max:50'
        ]);

        $trackingId = strtoupper(trim($request->input('track-id')));

        $shipment = Shipment::where('tracking_number', $trackingId)->first();

        if (!$shipment) {
            return redirect()->back()
                ->with('error', 'Invalid Tracking ID. Please check and try again.');
        }

        return view('trackorder', compact('shipment'));
    }

}
