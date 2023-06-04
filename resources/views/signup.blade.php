@extends('layouts.main')

@section('container')
    <div class="formContainer">
        <div class="logoContainer">
            <img src="/images/logo.png">
            <p class="loginText">Sign Up</p>
        </div>

        <div class="formContent">
            <form action="/signup" method="post">
                @csrf
                <div class="name formSec">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" required>
                    @error('name')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="code formSec">
                    <label for="code">NIM / Lecturer Code</label>
                    <input type="text" name="code" id="code" value="{{ old('code') }}" placeholder="NIM / Lecturer Code" required>
                    @error('code')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
                    @error('password')
                        <div class="thisError">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p>Already have an account? <a href="/login">Login</a></p>

                <div class="submit formSec">
                    <button class="button submitBtn" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

@endsection
