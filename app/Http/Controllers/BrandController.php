<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands',
            // Add any other validation rules as needed
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;

        $brand->save();
        return redirect()->route('brands.create')->with('success', 'Brand created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        // Check if the brand exists
        if (!$brand) {
            return redirect()->route('brands.index')->with('error', 'Brand not found.');
        }

        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        // Check if the brand exists
        if (!$brand) {
            return redirect()->route('brands.index')->with('error', 'Brand not found.');
        }

        $request->validate([
            'brand_name' => 'required|max:255',
            // Add any other validation rules as needed
        ]);

        $brand->brand_name = $request->input('brand_name');
        // Update other fields as needed
        $brand->save();

        return redirect()->back()->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        // Check if the brand exists
        if (!$brand) {
            return redirect()->route('brands.index')->with('error', 'Brand not found.');
        }

        // Delete the brand
        $brand->delete();

        // Redirect with a success message
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
