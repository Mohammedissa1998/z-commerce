<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;


class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {   

        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',

        ]);
       
        Stripe::setApiKey("sk_test_51MCQZpAtjajpZVyyg9R7pdqlhdEuOzS6ZpqErvNlsZgbGUBhz8xnqI345YeMMTgbeXpRyz3m9tXARpy6e1vxt1Ct00uSCrUkH2");
      
    
      
        $intent = null;
        try {
            if ($request->payment_method_id) {
                # Create the PaymentIntent
                $intent = PaymentIntent::create([
                'payment_method' => $request->payment_method_id,
                'amount' => Cart::totalAmount() * 100,
                'currency' => 'usd',
                'confirmation_method' => 'manual',
                'confirm' => true,
                ]);
          }
          

        } catch (ApiErrorException $e) {
          # Display error on client
          echo json_encode([
            'error' => $e->getMessage()
          ]);
        }
        
            //store the data
           $order = Order::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'stripe_id' => $request->payment_intent_id,
                'status' => 'pending',
                'total' => Cart::totalAmount() * 100




           ]);

           foreach(session()->get('cart') as $item)
           {
                $order->items()->create([
                    'product_id' => $item['product']['id'],
                    'color_id' => $item['color']['id'],
                    'quantity' => $item['quantity'],


                ]);

              

           }

        session()->forget('cart');

        return view('pages.orderSuccess', ['order' => $order]);
       
      
    }
}
