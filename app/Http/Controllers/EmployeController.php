<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = employe::latest()->get();

        return view('employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('employes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'role' => 'required|string',
            'age'       => 'required|numeric|min:1',
        ]);

        employe::create($validated);

        return redirect()
            ->route('employes.index')
            ->with('success', 'Trabajador agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(employe $employe)
    {
        return view('employes.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employe $employe)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'role' => 'required|string',
            'age'       => 'required|numeric|min:1',
        ]);

        $employe->update($validated);

        return redirect()
            ->route('employes.index')
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employe $employe)
    {
       $employe->delete();

        return redirect()
            ->route('employes.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
