<?php

namespace App\Http\Controllers;

use App\Models\camera;
use App\Models\client;
use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with(['camera', 'client'])->latest()->get();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cameras = Camera::orderBy('serial')->get();
        $clients = Client::whereNotNull('document')->orderBy('name')->get();

        return view('services.create', compact('cameras', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'camera_serial'   => 'required|string|exists:cameras,serial',
            'client_name'   => 'required|string',
            'client_document' => 'required|string|exists:clients,document',
        ]);

        Service::create($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Servicio agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load(['camera', 'client']);

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $cameras = Camera::orderBy('serial')->get();
        $clients = Client::whereNotNull('document')->orderBy('name')->get();

        return view('services.edit', compact('service', 'cameras', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'camera_serial'   => 'required|string|exists:cameras,serial',
            'client_name'     => 'required|string',
            'client_document' => 'required|string|exists:clients,document',
        ]);

        $service->update($validated);

       $client = Client::where('document', $validated['client_document'])->first();
        if ($client) {
        $client->update([
            'name' => $validated['client_name']
        ]);
        }

        $client = Client::where('document', $validated['client_document'])->first();
        if ($client) {
            $client->update([
            'name' => $validated['client_name']
        ]);
        }

        return redirect()
        ->route('services.index')
        ->with('success', 'Datos actualizados correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
