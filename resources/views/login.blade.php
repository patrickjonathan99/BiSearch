@extends('layouts.main')

@section('container')
    <div class="formContainer">
        <div class="logoContainer">
            <img src="/images/logo.png">
            <p class="loginText">Login</p>
        </div>

        <div class="formContent">
            <form action="">
                <div class="email">
                    <label for="email">Email (@binus.ac.id)</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <p>Don't have an account? <a href="">Sign Up</a></p>

                <div class="submit">
                    <button class="button submitBtn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
