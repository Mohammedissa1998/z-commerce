<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //adminpanel

    //display product table
    public function index()
    {
        return view('admin.pages.products.index');

    }

    //create
    public function create()
    {
        return view('admin.pages.products.create');

    }

    //store
    public function store(Request $request)
    {
        return "save product";

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
