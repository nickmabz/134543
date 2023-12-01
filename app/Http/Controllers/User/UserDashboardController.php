<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Prediction;
use Illuminate\Http\Request;
use App\Models\ParkingLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserDashboardController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        $userId = session()->get('user_id');

        $user = User::find($userId);

        $parkingLocations = ParkingLocation::all();


        $userPredictions = Prediction::where('user_id', Auth::id())->get();

        return view('user.dashboard', [
            'page_title' => $page_title,
            'user' => $user,
            'userPredictions' => $userPredictions,
            'parkingLocations' => $parkingLocations,
        ]);
    }

    public function predict(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'location' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Convert date to weekday
        $weekday = date('N', strtotime($validatedData['date'])); // 'N' for numeric representation (1 for Monday, 7 for Sunday)

        // Extract hour from time
        $hour = date('G', strtotime($validatedData['time'])); // 'G' for 24-hour format without leading zeros

        // Prepare the payload
        $payload = [
            'systemCodeNumber' => $validatedData['location'],
            'hour' => $hour,
            'weekday' => $weekday,
            'capacity' => 500 // assuming capacity is a fixed value
        ];

        // Send a POST request to the FastAPI endpoint
        $response = Http::post('http://127.0.0.1:8001/v1/pred/predict', $payload);

        // Check for a successful response
        if ($response->successful()) {
            // Extract prediction data from the response
            $predictionData = $response->json()['data'];

            // Create a new prediction record in the database
            $prediction = new Prediction([
                'user_id' => Auth::id(),
                'location' => $payload['systemCodeNumber'],
                'date' => $validatedData['date'],
                'time' => $validatedData['time'],
                'predicted_occupancy' => $predictionData['predicted_occupancy'],
                'percentage_occupancy' => $predictionData['percentage_occupancy'],
                'remaining_spaces' => $predictionData['remaining_spaces'],
            ]);
            $prediction->save();

            // Store the result in the session and redirect back with a success message
            return redirect()->back()->with([
                'success' => 'Prediction made successfully.',
                // 'prediction' => $predictionResult
            ]);
        } else {
            // Handle errors
            $error = $response->json()['detail'] ?? 'An error occurred';

            // Redirect back with an error message
            return redirect()->back()->with('error', $error);
        }
    }
}
