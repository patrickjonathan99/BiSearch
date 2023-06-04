@extends('layouts.main')

@section('container')
    <div class="formContainer">
        <div class="logoContainer">
            <img src="/images/logo.png">
            <p class="loginText">Login</p>
        </div>

        <div class="formContent">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/login" method="post">
                @csrf
                <div class="email formSec">
                    <label for="email">Email (@binus.ac.id)</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                    @error('email')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="password formSec">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <p>Don't have an account? <a href="/signup">Sign Up</a></p>

                <div class="submit formSec">
                    <button class="button submitBtn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
