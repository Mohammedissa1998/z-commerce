@extends('layouts.master')
@section('title', 'checkout')
@section('content')

    <header class="page-header">
        <h1>checkout</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>
   
    <main class="checkout-page">
        <div class="container">
           
                <div class="checkout-form">
                    <form action="" id="payment-form" method="post">
                        @csrf 
                        <div class="field">
                        <label for="name">name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="john" value="{{old('name') ? old('name') : auth()->user()->name}}">
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="john" value="{{old('email') ? old('email') : auth()->user()->email}}">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="@error('phone') has-error @enderror" placeholder="john" value="{{old('phone') ? old('phone') : auth()->user()->phone}}">
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="country">Country</label>
                        <select name="country" id="country" >
                        <option value="">-- Select Country --</option>
                        <option value="United States">united states</option>
                        </select>
                        @error('country')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="@error('state') has-error @enderror" placeholder="john" value="{{old('state') ? old('state') : auth()->user()->state}}">
                        @error('state')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="@error('city') has-error @enderror" placeholder="john" value="{{old('city') ? old('city') : auth()->user()->city}}">
                        @error('city')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>  

                    <div class="field">
                        <label for="zip">ZipCode</label>
                        <input type="text" id="zip" name="zip" class="@error('zip') has-error @enderror" placeholder="john" value="{{old('zip') ? old('zip') : auth()->user()->zip}}">
                        @error('zip')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    
                    <div class="field">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="@error('address') has-error @enderror" placeholder="john" value="{{old('address') ? old('address') : auth()->user()->address}}">
                        @error('address')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    </form>
                </div>

            </div>
    </main>

@endsection