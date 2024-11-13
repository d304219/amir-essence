<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('category/categories')->with('categories', $categories);
    }

    public function index()
    {
        $categories = Category::all();
        return view('dashboard/categories/index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories,name',
            'font' => 'nullable|string'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->font = $request->font;

        $category->save();
        session()->flash('success', 'Category created successfully!');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard/categories/show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard/categories/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'font' => 'nullable|string'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->font = $request->font;

        $category->save();
        session()->flash('info', 'Category updated successfully!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        session()->flash('error', 'Category deleted successfully!');
        return redirect()->route('categories.index');
    }

}
