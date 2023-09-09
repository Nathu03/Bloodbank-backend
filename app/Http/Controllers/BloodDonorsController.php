<?php

namespace App\Http\Controllers;
use App\Models\BloodDonors;
use App\Models\ScheduleEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BloodDonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BDdata = BloodDonors::all();

// dd($BDdata);
        return response()->json($BDdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'bloodType' => 'required',
                'address' => 'required',
                'city' => 'required',
                'postalCode' => 'required',
                'imageFile' => 'nullable',
                'medicalDocument' => 'required',
                'bloodDonationCard' => 'required',
                'nicOrPassport' => 'required',
                // 'date' => 'required|date',
                // 'description' => 'nullable|string',
            ]);

            $userId = Auth::id();
            $validatedData['userid'] = $userId;
            $scheduleEvent = BloodDonors::create($validatedData);

            return response()->json($scheduleEvent, 201);

            // Optionally, you can also return a success message if needed
            // return response()->json(['message' => 'Schedule event created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
