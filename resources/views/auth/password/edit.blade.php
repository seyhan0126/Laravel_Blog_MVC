@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 45px">
        <h4>Update Password | Custom</h4><hr>
        <form action={{ route('update.password') }} method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" class="form-control"  name="old_password" placeholder="old password">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
            </div>
            <button type="submit" class="btn btn-block btn-primary mt-3">Update</button><br>        
        </form>
    </div>
</div>

@endsection