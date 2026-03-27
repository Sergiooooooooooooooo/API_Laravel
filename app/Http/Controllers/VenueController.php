<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all(); // cambiar
        return response()->json([
            'message' => 'Success',
            'status' => true,
            'data' => $venues
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenueRequest $request)
    {
        $venue = Venue::create($request->validated());
        return response()->json([
            'message' => 'Venue created successfully',
            'status' => true,
            'data' => $venue
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return response()->json($venue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $venue->update($request->validated());
        return response()->json([
            'message' => 'Venue updated successfully',
            'status' => true,
            'data' => $venue
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return response()->json([
            'message' => 'Venue deleted successfully',
            'status' => true
        ]);
    }
}
