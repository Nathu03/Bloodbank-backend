<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduleEvent;
use Illuminate\Http\Request;

class ScheduleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
{
    $events = ScheduleEvent::orderBy('id', 'desc')->get();


    return response()->json($events);
}

// In a different function where you want to redirect with a success message
// public function redirectToEventList()
// {
//     // Fetch the events data to be used in the view
//     $events = ScheduleEvent::all();

//     // Redirect to the desired route with the events data and success message
//     return route('event.show', ['events' => $events])->with('success', 'Event data fetched successfully.');
// }


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
                'title' => 'required|string',
                'date' => 'required|date',
                'location' => 'required|string',
                'description' => 'nullable|string',
            ]);

            $userId = Auth::id();
            $validatedData['userid'] = $userId;
            $scheduleEvent = ScheduleEvent::create($validatedData);

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
     * @param  \App\Models\ScheduleEvent  $scheduleEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleEvent $scheduleEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleEvent  $scheduleEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleEvent $scheduleEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleEvent  $scheduleEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleEvent $scheduleEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleEvent  $scheduleEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleEvent $scheduleEvent)
    {
        //
    }
}
