<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ParkingLocation;
use App\Http\Controllers\Controller;

class ParkingController extends Controller
{
    public function index()
    {
        $page_title = 'Parking Locations';

        $parkingLocations = ParkingLocation::all();

        return view('admin.parking_locations', [
            'page_title' => $page_title,
            'parkingLocations' => $parkingLocations,
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'system_code' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',

        ]);

        ParkingLocation::create($validatedData);

        return redirect()->route('admin.parkinglocations')->with('success', 'Parking location created successfully.');
    }

    public function edit(ParkingLocation $parkingLocation)
    {
        $page_title = 'Parking Locations';

        return view('admin.edit_parking_location', compact('parkingLocation', 'page_title'));
    }

    public function update(Request $request, ParkingLocation $parkingLocation)
    {
        $validatedData = $request->validate([
            'system_code' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',

        ]);

        $parkingLocation->update($validatedData);

        return redirect()->route('admin.parkinglocations')->with('success', 'Parking location updated successfully.');
    }

    public function delete($id)
    {
        $parkingLocation = ParkingLocation::findOrFail($id);

        $parkingLocation->delete();

        $success_msg = 'Parking Location : ' . $parkingLocation->location . ' deleted successfully.';

        return redirect()->route('admin.parkinglocations')->with('success', $success_msg);
    }


}
