@extends('layouts.master')
@section('content')
@section('title', 'Register')

    <section class="login-page"> 
        <div class="login-form-box">
            <div class="login-title"> Register</div>
            <div class="login-form">
            
            <form action="{{route('register')}}" method="post">
                
                @csrf
                    
                    <div class="field">
                        <label for="name">name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="john" >
                        @error('name')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror"  placeholder="john@gmail.com" >
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" class="@error('password') has-error @enderror"  placeholder="******" >
                        @error('password')
                        <span class="field-error">{{$message}}</span>
                        @enderror
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