@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 45px">
        <h4>Update Profil | Custom</h4><hr>
        <form action={{ route('update.profil') }} method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" placeholder="Enter your full name">
               
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="{{auth()->user()->email}}" name="email" placeholder="Enter email address">
            </div>
            <button type="submit" class="btn btn-block btn-primary mt-3">Update</button><br>        

        </form>
    </div>
</div>

@endsection