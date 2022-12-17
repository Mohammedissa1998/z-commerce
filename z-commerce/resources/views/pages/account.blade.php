@extends('layouts.master')
@section('title', 'Account')
@section('content')

    <div class="accounts-page">

            <div class="container">
            <section class="u-box">
                <div class="user-info">
                    <p class="user-name">
                        {{auth()->user()->name}}
                    </p>
                    <p class="user-email">
                        {{auth()->user()->email}}
                    </p>
                 
                </div>

                <div class="user-btn">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary">logout</button>

                </form>
                </div>
            </section>

            <section class="order-box">
                <p class="orders-box-title">Orders</p>
                <table class="table">
                    <thead> 
                        <tr>
                            <th>ID</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>

                    </thead>
                    <tbody>
                        @if(auth()->user()->orders &&  auth()->user()->orders->count())
                        @foreach (auth()->user()-> orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->items->count()}}</td>
                            <td>${{$order->total / 100}}</td>
                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                            <td>{{$order->status}}</td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" style="text-align: center">No Orders</td>
                        </tr>
                        @endif
                        
                        
                    </tbody>
                </table>

            </section>
            
        </div>

    </div>
    
@endsection