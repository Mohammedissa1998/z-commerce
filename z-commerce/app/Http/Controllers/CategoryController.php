<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index
    public function index(){
        $categories = Category::all();
        return view('admin.pages.categories.index', ['categories' => $categories]);

    }

    public function store(Request $request){
        //validate
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        //store
        $category = new Category();
        $category -> name = $request->name;
        $category->save();

        //return back
        
        return back()->with('success','Category Saved');
    }

    public function edit($id){
        $categorie = Category::findOrfail($id);
        return view('admin.pages.categories.edit', ['categorie' => $categorie]);
    }

    public function update(Request $request, $id){
        //validate
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id.'|max:255'
        ]);

        $category = Category::findOrfail($id);
        $category -> name = $request->name;
        $category->save();
        //return back
        
        return back()->with('success','Category Update');
    }

    public function destroy($id){

       Category::findOrfail($id)->delete();
       return back()->with('success', 'category Deleted');

    }

}
