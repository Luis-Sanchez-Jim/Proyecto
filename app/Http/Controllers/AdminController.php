<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        $admins = Admin::latest()->get();

        return view('admins.index', compact('admins'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'age'       => 'required|numeric|min:1',
        ]);

        Admin::create($validated);

        return redirect()
            ->route('admins.index')
            ->with('success', 'Administrador agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'document' => 'nullable|string',
            'age'       => 'required|numeric|min:1',
        ]);

        $admin->update($validated);

        return redirect()
            ->route('admins.index')
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admins.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
