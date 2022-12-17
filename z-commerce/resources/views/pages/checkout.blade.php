@extends('layouts.master')
@section('title', 'checkout')
@section('head')
<script src="https://js.stripe.com/v3/"></script>
<script src={{asset('js/stripe.js')}}></script>
<style>
 
        .StripeElement {
        height: 40px;
        padding: 10px 12px;
        width: 100%;
        color: #32325d;
        background-color: white;
        border: 1px solid transparent;
        border-radius: 4px;
        margin-bottom: 20px;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
        border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
}
</style>
@section('content')

    <header class="page-header">
        <h1>checkout</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>
   
    <main class="checkout-page">
        <div class="container">
           
                <div class="checkout-form">
                    <form action="{{route('stripeCheckout')}}" id="payment-form" method="post">
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
                            <input type="hidden" name="payment_method_id" id="payment_method_id" value="">
                    <label>
                        Card details
                        <!-- placeholder for Elements -->
                        <div id="card-element"></div>
                    </label>
                    <button class = "btn btn-primary btn-block" type="submit">Submit Payment</button>

                    </form>
                </div>

            </div>
    </main>
    <script>
        const stripe = Stripe('pk_test_51MCQZpAtjajpZVyyMMAzs38iRUMwvICwo326wYs5LMyjwEXSytZK9DyrkCoxOZ0H9bxEoCTZ9jL5rTax8hYadmm400zQBeREfb');

        const elements = stripe.elements();

// Set up Stripe.js and Elements to use in checkout form
            const style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            },
            };

            const cardElement = elements.create('card', {style});
            cardElement.mount('#card-element');

            const form = document.getElementById('payment-form');

            form.addEventListener('submit', async (event) => {
            // We don't want to let default form submission happen here,
            // which would refresh the page.
            event.preventDefault();

            const result = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                // Include any additional collected billing details.
                name: 'Jenny Rosen',
                },
            })

            stripePaymentMethodHandler(result);
            });
            const stripePaymentMethodHandler = async (result) => {
            if (result.error) {
                // Show error in payment form
            } else{

            document.getElementById('payment_method_id').value = result.paymentMethod.id
            form.submit();

            }
            }
    </script>
@endsection