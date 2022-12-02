@extends('layouts.master')
@section('title', 'Account')
@section('content')

    <div class="accounts-page">

            <div class="container">

            @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary">logout</button>

                </form>
            @endauth

        </div>

    </div>
    
@endsection