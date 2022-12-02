@extends('layouts.master')
@section('name', 'Home page')
@section('content')
<main class="homepage">

@include('pages.components.home.header')
       <section class="products-section">
            <div class="container">
                <div class="section-title">
                    <h1>Featured Products</h1>
                    <div class="product-row">
                        @foreach ($products as $product)

                            <x-product-box :product="$product" />

                        @endforeach
                    </div>
                </div>
            </div>

       </section>
</main>
@endsection