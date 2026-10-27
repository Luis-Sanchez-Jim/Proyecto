<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = client::latest()->get();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'age'       => 'required|numeric|min:1',
        ]);

        client::create($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'age'       => 'required|numeric|min:1',
        ]);

        $client->update($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
