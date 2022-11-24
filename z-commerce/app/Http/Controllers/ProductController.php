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
        $products = Product::all();
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

        // $request->validate([

        //     'title' => 'required|max:255',
        //     'category' => 'required',
        //     'colors' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'



        // ]);
        
        //store image
        $image_name = 'products/' . time() . $request->image->getClientOriginalExtension();
        dd($image_name);


        //store



        //return response





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
        return "delete products";

    }


}
