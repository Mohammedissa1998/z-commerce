<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //home
    public function home(){
        $categories = Category::get();
        $products = Product::with('category', 'colors')->orderBy('created_at','desc')->get();
        return view('pages/home', [
            'products' => $products,
            'categories' => $categories,
        ] );
    }

    public function search(Request $request)
    {
        if($request->isMethod('post')) {
            $params = http_build_query($request->except('_token'));
            return redirect()->route('search', $params);
        }

        $products = Product::query()
        ->when($request->query('category_id'), function($q) use($request) {
            $q->where('category_id', $request->query('category_id'));
        })
        ->when($request->query('query'), function($q) use($request) {
            $q->where('title', 'like', '%'.$request->query('query').'%');
        })
        ->when($request->query('sub_categorie_id'), function($q) use($request) {
            $q->where('sub_categorie_id', $request->query('sub_categorie_id'));
        })
        ->when($request->query('price'), function($q) use($request) {
            $q->whereBetween('price', [0, $request->query('price')]);
        })
        ->paginate(15);
        return view('pages/search-result', ['products' => $products]);
    }

    //cart
    public function cart(){        
        return view('pages/cart');
    }


    public function wishlist(){
        $products = Auth::User()->wishlist;
        return view('pages.wishlist', ['products' => $products]);
    }


    public function checkout(){
        return view('pages.checkout');
    }

    public function account(){
        return view('pages.account');
    }

    public function success(){
        return 'succesfully done';
    }

    public function product($id)
    {
        $product = Product::with('category','colors')->findOrFail($id);
        return view('pages.product', ['product' => $product]);
    }



}
