<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //adminpanel

    //display product table
    public function index()
    {   
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.products.index', ['products' => $products]);

    }

    //create
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.create', ['categories' => $categories, 'colors' => $colors]);

    }

    //store
    public function store(Request $request)
    {   //validate
        $request->validate([

            'title' => 'required|max:255',
            'category' => 'required',
            'colors' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpeg,gif,jpg,svg|max:2048'


        ]);
       
        //store image
        $image_name = 'products/' . time() . rand(0,9999). '.' . $request->image->getClientOriginalExtension();
        dd($image_name);
        $request->image->storeAs('public', $image_name);


        //store

        $product = Product::create([
            'title' => $request->title,
            'category_id'  => $request->category_id,
            'price' => $request->price*100,
            'description' => $request->description,
            'image' => $image_name
            
        ]);
        
        $product->colors()->attach($request->colors);

        //return response
       
        return back() ->with('success', 'Product saved');



    }

    //edit
    public function edit()
    {
        return "edit products";

    }

    //update
    public function update()
    {
        return "update products";

    }

    //delete
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product deleted');

    }


}
