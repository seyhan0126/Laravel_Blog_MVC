@extends('layouts.app')

@section('content')
<form class="form-signin" action={{ route('auth.check') }} method="POST">
    @csrf
    <h4 class="h3 mb-3 font-weight-normal">Please sign in | Custom</h4>
    <label for="inputEmail" class="sr-only">Email address</label>
    {{--  not working email old ?  --}}
    <input type="email" name="email" id="inputEmail" value="{{ Request::old('email')  }}" class="form-control" placeholder="Email address" >
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
    
    <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Sign in</button>
  </form>
@endsection