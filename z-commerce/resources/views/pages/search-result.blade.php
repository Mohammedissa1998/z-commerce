@extends('layouts.master')
@section('name', 'Home page')
@section('content')
<main class="homepage">

<section class="products-section">
    <div class="container">
        <div class="section-title">
            <h1>Product Search Results</h1>
            <div class="product-row">
               {{--  @foreach ($products as $product)

                    <x-product-box :product="$product" />

                @endforeach --}}
                {{-- @dump($products) --}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                <a href="{{ route('product', $product->id) }}">{{ $product->title }}</a>
                                </td>
                                <td>${{$product->price / 100}}</td>
                            </tr>
                        @empty
                            <td colspan="3">No Product Found</td>
                        @endforelse
                    </tbody>
                </table>

                {{ $products->links() }}
            </div>
        </div>
    </div>

</section>
</main>
@endsection