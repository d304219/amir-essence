<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('perfumes')->with('products', $products);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard/products/index')->with('products', $products);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/products/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'volume' => 'nullable|numeric',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'img_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->volume = $request->volume;
        $product->description = $request->description;
        $product->ingredients = $request->ingredients;
        $product->category_id = $request->category_id;

        // Handling image upload
        if ($request->hasFile('img_file')) {
            $imageName = time().'.'.$request->img_file->extension();
            $request->img_file->storeAs('public', $imageName);
            $product->img_file = $imageName;
        }

        $product->save();

        return redirect()->route('products.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard/products/show')->with('product', $product);    
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Assuming you have a Category model
    
        return view('dashboard/products/edit', compact('product', 'categories'));
    }
    
/**
 * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'volume' => 'nullable|numeric',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'img_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->volume = $request->volume;
        $product->description = $request->description;
        $product->ingredients = $request->ingredients;
        $product->category_id = $request->category_id;

        // Handling image upload
        if ($request->hasFile('img_file')) {
            $imageName = time().'.'.$request->img_file->extension();
            $request->img_file->storeAs('public', $imageName);
            $product->img_file = $imageName;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

}
