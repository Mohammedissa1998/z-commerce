@extends('layouts.master')
@section('content')
@section('title', 'Register')

    <section class="login-page"> 
        <div class="login-form-box">
            <div class="login-title"> Register</div>
            <div class="login-form">


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            
            <form action="{{route('register')}}" method="post">
                
                @csrf
                    
                    <div class="field">
                        <label for="name">name</label>
                        <input type="text" id="name" name="name" placeholder="john" >

                    </div>

                    <div class="field">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" placeholder="john@gmail.com" >

                    </div>

                    <div class="field">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" placeholder="******" >

                    </div>

                    <div class="field">
                        <label for="passowrd_confirmation">confirm password</label>
                        <input type="password" id="password" name="password_confirmation" placeholder="******" >

                    </div>

                    <div class="field">
                        <button type= "submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    
                    
                </form>
            </div>
        </div>

    </section>
@endsection