<section class="product-box">
                    <div class="image">
                        <img src="{{asset('storage/' . $product->image)}}" alt="" >
                        @auth
                        @if (auth()->user()->wishlist->contains($product))
                        <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" class="add-to-wishlist">Remove From Wishlist</button>
                        </form>
                        @else
                        <form action="{{route('addToWishlist', $product->id)}}" method="post">
                            @csrf
                            <button type="submit" class="add-to-wishlist">Add To Wishlist</button>
                        </form>
                        @endif  
                        @endauth
                       
                    </div>
                    <a href="{{route('product', $product->id)}}">
                    <div class="product-title">{{$product->title}}</div>
                    <div class="color-plateletes">
                        @foreach($product->colors as $color)
                        <div class="color-platelete" style="background: {{$color->code}}">
                        @endforeach
                    </div>
                    </div>
                
           
        <div class="product-category">{{$product->title}}</div>
        <div class="product-price">${{$product->price / 100}}</div>
        </a>
</section>
