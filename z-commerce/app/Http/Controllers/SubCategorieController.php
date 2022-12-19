<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $subcategories = $category->subcategorys;
        // dd($subcategories);
        return view('admin.pages.subcategories.index', [
            'subcategories' => $subcategories,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        //validate
        $request->validate([
            'name' => [
                'required',
                'max:255', 
                function ($attribute, $value, $fail) use($category) {
                    if (SubCategory::where(['name' => $value, 'categorie_id' => $category->id])->count()) {
                        $fail('Sub category name already exists.');
                    }
                },
            ]
        ]);

        //store
        $subcategory = new SubCategory();
        $subcategory->categorie_id = $category->id;
        $subcategory->name = $request->name;
        $subcategory->save();

        //return back
        
        return back()->with('success','Sub Category Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, SubCategory $subcategory)
    {
        return view('admin.pages.subcategories.edit', ['category' => $category, 'subcategory' => $subcategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, SubCategory $subcategory)
    {
        //validate
        $request->validate([
            'name' => [
                'required',
                'max:255', 
                function ($attribute, $value, $fail) use($category, $subcategory) {
                    if (SubCategory::where(['name' => $value, 'categorie_id' => $category->id])->where('id', '!=', $subcategory->id)->count()) {
                        $fail('Sub category name already exists.');
                    }
                },
            ]
        ]);

        $subcategory->name = $request->name;
        $subcategory->save();

        //return back
        
        return back()->with('success','Sub Category Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, SubCategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('success', 'sub category Deleted');
    }
}
