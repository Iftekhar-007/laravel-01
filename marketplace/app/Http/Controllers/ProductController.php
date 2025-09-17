<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Homepage, all users dekhte pabe
    public function index()
    {
        $products = Product::paginate(6); // প্রতি পেজে 6 টা প্রোডাক্ট
        return view('home', compact('products'));
    }

    // Vendor: Add Product form দেখাবে
    public function create()
    {
        return view('products.create');
    }

    // Vendor: Store new product
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // each image max 2MB
        ]);

        $imagePaths = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // storage/app/public/products
                $imagePaths[] = $path;
            }
        }

        // Create product without user_id
       Product::create([
    'name' => $request->name,
    'description' => $request->description,
    'price' => $request->price,
    'stock' => $request->stock,
    'images' => json_encode($imagePaths),
]);


        return redirect()->route('dashboard')->with('success', 'Product added successfully!');
    }

    // Vendor: My Products
    public function myProducts()
    {
        $products = Product::paginate(6);
        return view('products.myProducts', compact('products'));
    }
}
