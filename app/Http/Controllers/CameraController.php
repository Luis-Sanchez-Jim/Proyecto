<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cameras= Camera::latest()->get();

        return view('cameras.index', compact('cameras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cameras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mark'        => 'required|string',
            'model' => 'required|string',
            'serial'       => 'required|string|unique:cameras,serial',
        ]);

        Camera::create($validated);

        return redirect()
            ->route('cameras.index')
            ->with('success', 'Camara agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Camera $camera)
    {
        return view('cameras.show', compact('camera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camera $camera)
    {
        return view('cameras.edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camera $camera)
    {
        $validated = $request->validate([
            'mark'        => 'required|string',
            'model' => 'required|string|unique',
            'serial'       => 'required|string',
        ]);

        $camera->update($validated);

        return redirect()
            ->route('cameras.index')
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camera $camera)
    {
        $camera->delete();

        return redirect()
            ->route('cameras.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
