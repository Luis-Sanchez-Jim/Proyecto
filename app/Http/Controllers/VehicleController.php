<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles= vehicle::latest()->get();

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark'        => 'required|string',
            'model' => 'required|string',
            'plate'       => 'required|string',
        ]);

        vehicle::create($validated);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Vehiculo agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle $vehicle)
    {
       return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicle $vehicle)
    {
         $validated = $request->validate([
            'mark'        => 'required|string',
            'model' => 'required|string',
            'plate'       => 'required|string',
        ]);

        $vehicle->update($validated);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
