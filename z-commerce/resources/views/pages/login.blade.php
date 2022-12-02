@extends('layouts.master')
@section('content')
@section('title', 'Login')

    <section class="login-page"> 
        <div class="login-form-box">
            <div class="login-title"> Login</div>
            <div class="login-form">
            
            <form action="{{route('login')}}" method="post">
                
                @csrf
                    
                   

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
                        <button type= "submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    
                    <a href="{{route('register')}}"> New user ? register now</a>

                    
                </form>
            </div>
        </div>

    </section>
@endsection