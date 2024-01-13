<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|unique:units',
            // Add any other validation rules as needed
        ]);

        $unit = new Unit();
        $unit->unit_name = $request->unit_name;

        $unit->save();
        return redirect()->route('units.create')->with('success', 'Unit created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Unit::find($id);

        // Check if the unit exists
        if (!$unit) {
            return redirect()->route('units.index')->with('error', 'Unit not found.');
        }

        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);

        // Check if the unit exists
        if (!$unit) {
            return redirect()->route('units.index')->with('error', 'Unit not found.');
        }

        $request->validate([
            'unit_name' => 'required|max:255',
            // Add any other validation rules as needed
        ]);

        $unit->unit_name = $request->input('unit_name');
        // Update other fields as needed
        $unit->save();

        return redirect()->back()->with('success', 'Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);

        // Check if the unit exists
        if (!$unit) {
            return redirect()->route('units.index')->with('error', 'Unit not found.');
        }

        // Delete the unit
        $unit->delete();

        // Redirect with a success message
        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
