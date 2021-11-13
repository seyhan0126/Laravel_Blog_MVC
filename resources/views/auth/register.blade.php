@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 45px">
        <h4>Register Form | Custom</h4><hr>
        <form action={{ route('auth.handleRegister') }} method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ Request::old('name')  }}"  placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="{{ Request::old('username')  }}"  placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="{{Request::old('email') }}" placeholder="Enter email address">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
            </div>
            <button type="submit" class="btn btn-block btn-primary mt-2">Sign Up</button><br>
            <a href={{ route('auth.login') }}>I already have an account, sign in</a>
        </form>
    </div>
</div>

@endsection