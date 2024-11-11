<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('categories')->with('categories', $categories);
    }
}
