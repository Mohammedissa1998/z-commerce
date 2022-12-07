@extends('layouts.master')
@section('title', $product->title)
@section('content')

@if (session()->has('success'))
    <section class="pop-up">
        <div class="pop-up-box">
            <div class="pop-up-title">
                {{session()->get('success')}}
            </div>
            <div class="pop-up-actions">
                <a href="{{route('cart')}}" class="btn btn-outlined" >Continue Shopping</a>
                <a href="{{route('cart')}}" class="btn btn-primary" >Go To Checkout</a>

            </div>
        </div>
    </section>
    {{session()->get('addedToCart')}}
@endif

    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="{{asset('storage/' . $product->image)}}" alt="">
                </section>
                <section class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">${{$product->price/100}}</p>
                    <p class="p-category">-{{$product->category->name}}</p>
                    <p class="p-description">{{$product->description}}</p>
                    <form action = "{{route('addToCart', $product->id)}}" method="post">

                    @csrf 
                    <div class="p-form">
                        <div class="p-colors">
                            <label for="color">colors</label>
                            <select name="color" id="color" required>
                                <option value="">-- color --</option>
                                @foreach($product->colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>

                                 
                                @endforeach
                            </select>
                        </div>
                        <div class="p-quantity">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" min ="1" max = "100" value="1" required >
                        </div>
                    </div>
                    <button class="btn btn-cart" type="submit">add to cart</button>


                    </form>

                </section>
            </div>
        </div>
    </div>

@endsection