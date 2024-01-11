<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
    
        $category = new Category();
        $category->category_name = $request->category_name;
  
        $category->save();
        return redirect()->route('categories.create')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);

    // Check if the category exists
    if (!$category) {
        return redirect()->route('categories.index')->with('error', 'Category not found.');
    }

    return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $category = Category::find($id);

        // Check if the category exists
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
    
        $request->validate([
            'category_name' => 'required|max:255',
            // Add any other validation rules as needed
        ]);
    
        $category->category_name = $request->input('category_name');
        // Update other fields as needed
        $category->save();
    
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        // Check if the category exists
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
    
        // Delete the category
        $category->delete();
    
        // Redirect with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
