@extends('layouts.master')
@section('title', 'Wishlist')
@section('content')

<header class="page-header">
        <h1>wishlist</h1>
   
    </header>
    <div class="container" style="margin-top: 70px">
    <div class="product-row">
         @foreach ($products as $product)

             <x-product-box :product="$product" />

             @endforeach
        </div>
        </div>
@endsection