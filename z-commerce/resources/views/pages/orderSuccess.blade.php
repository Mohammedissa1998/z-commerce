@extends('layouts.master')
@section('title','Success')
@section('content')

    <header class="page-header">
        <h1>Order Succesfully Placed </h1>
    </header>
   <section class="page-success">
    <div class="container">
        <h1>Your order has been succesfully placed </h1>
        <h2>Your order ID is: {{$order->id}}</h2>
    </div>
   </section>

@endsection