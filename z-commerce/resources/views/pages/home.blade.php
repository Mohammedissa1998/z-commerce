@extends('layouts.master')
@section('name', 'Home page')
@section('content')
<main class="homepage">

@include('pages.components.home.header')
<form action="{{route('logout)}}" method="post">

<button class="btn-primary"></button>

</form>
</main>
@endsection