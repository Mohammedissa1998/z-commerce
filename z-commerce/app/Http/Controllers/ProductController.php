<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
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

            'title'           => 'required|max:255',
            'category_id'     => 'required',
            'sub_categorie_id' => 'required',
            'colors'          => 'required',
            'price'           => 'required',
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'


        ]);
     
        //store image
         $image_name = 'products/' . time() . rand(0,9999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);
        //store
        $product = Product::create([

            'title'           => $request->title,
            'category_id'     => $request->category_id,
            'sub_categorie_id' => $request->sub_categorie_id,
            'price'           => $request->price *100,
            'description'     => $request-> description,
            'image'           => $image_name
            
        ]);
        
        $product->colors()->attach($request->colors);

        //return response
        return back()->with('success', 'product saved');




    }

    //edit
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        $colors     = Color::all();
        return view('admin.pages.products.edit', ['categories' => $categories, 'colors' => $colors, 'product'  => $product]);
    }

    //update
    public function update(Request $request, $id)
    {
        // dd($request->sub_categorie_id);
        $request->validate([
            'title'           => 'required|max:255',
            'category_id'     => 'required',
            'sub_categorie_id' => 'required',
            'colors'          => 'required',
            'price'           => 'required',
            'image'           => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
     

        $product = Product::findOrfail($id);
        //store image
        $image_name = $product->image;
        if($request->image){
            $image_name = 'products/' . time() . rand(0,9999) . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public', $image_name);
        }
        
        //store
        $product->update([

            'title'           => $request->title,
            'category_id'     => $request->category_id,
            'sub_categorie_id' => $request->sub_categorie_id,
            'price'           => $request->price *100,
            'description'     => $request-> description,
            'image'           => $image_name
            
        ]);
        
        $product->colors()->sync($request->colors);

        //return response
        return back()->with('success', 'product is updated');
    }

    //delete
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product deleted');

    }

    public function getSubcategories(Request $request)
    {
        $subcategories = SubCategory::where('categorie_id', $request->category_id)->get();
        $options = '<option value="">-- Select Sub Category --</option>';
        $selected = '';
        foreach($subcategories as $each) {
            if($request->has('subcat_id')) {
                if($request->subcat_id == $each->id) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            }
            $options .= '<option value="'.$each->id.'" '.$selected.'>'.$each->name.'</option>';
        }
        return $options;
    }


}
