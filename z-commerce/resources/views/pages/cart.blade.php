@extends('layouts.master')
@section('content')

    <header class="page-header">
        <h1>cart</h1>
        <h3 class="cart-amount">$999</h3>
    </header>
        <main class="cart-page">
            <div class="container">
                <div class="cart-table">
                    <div class="table">
                        <thead>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if(session()->has('cart') && count(session()->get('cart')) > 0 )
                            <tr>
                                @foreach(session()->get('cart') as $key => $item)
                                    <td>
                                        <a href="{{route('product', $item['product']['id'])}}" class="cart-item-title">
                                            <img src="{{asset('storage/' . $item['product']['image'])}}" alt="" >
                                            <p>{{$item['product']['title']}}</p>
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                            @else
                                <tr>
                                    <td colspan="6" class="empty-cart">your cart is empty</td>
                                </tr>
                            @endif
                        </tbody>
                    </div>
                </div>
            </div>
    </main>

@endsection