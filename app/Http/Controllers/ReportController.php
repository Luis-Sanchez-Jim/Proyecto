<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::latest()->get();

        return view('reports.index', compact('reports'));
    }

    public function userindex()
    {
        $reports = Report::where('email', auth()->user()->email)
                     ->latest()
                     ->get();
        return view('reports.userindex', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email' => 'nullable|string',
            'description' => 'required|string',
        ]);

        Report::create($validated);

        return redirect()
            ->route('reports.userindex')
            ->with('success', 'El reporte se mando correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
       $report->delete();

        return redirect()
            ->route('reports.index')
            ->with('success', 'Datos eliminados correctamente.');
    }
}
