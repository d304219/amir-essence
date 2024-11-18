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
        return view('products')->with('products', $products);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard/products/index')->with('products', $products);    
    }
    public function showCategoryProducts($id)
    {
        $category = Category::findOrFail($id); // Retrieve the category
        $products = $category->products; // Assuming a 'products' relationship exists in the Category model
    
        return view('category.products', compact('category', 'products'));
    }

    public function showLatestProducts()
    {
        // Fetch the latest 8 products from the database
        $latestProducts = Product::orderBy('created_at', 'desc')->take(8)->get();

        return view('home', compact('latestProducts'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Assuming you have a Category model
        return view('dashboard/products/create')->with('categories', $categories);    
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
            $image = $request->file('img_file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/products'), $imageName);
            $product->img_file = 'img/products/' . $imageName; // Save the path in the database
        }

        $product->save();
        session()->flash('success', 'Product created successfully!');
        return redirect()->route('products.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('show')->with('product', $product);    
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
    
        // Find the product by ID
        $product = Product::findOrFail($id);
        
        // Update product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->volume = $request->volume;
        $product->description = $request->description;
        $product->ingredients = $request->ingredients;
        $product->category_id = $request->category_id;
    
        // Handling image upload
        if ($request->hasFile('img_file')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->img_file->extension();
            
            // Store the image in the 'img/products' directory
            $request->img_file->move(public_path('img/products'), $imageName);
            
            // Update the product's image file path
            $product->img_file = 'img/products/' . $imageName;
        }
    
        // Save the updated product details
        $product->save();
    
        // Flash a success message to the session
        session()->flash('info', 'Product updated successfully!');
    
        // Redirect back to the products index page
        return redirect()->route('products.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        session()->flash('error', 'Product deleted successfully!');

        return redirect()->route('products.index');
    }

}
