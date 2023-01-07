{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login.{{ config('app.name') }}</title>
<link rel="shortcut icon" href="{{ asset('uploads/275254732_856839212148399_8094917767977980069_n.jpg') }}" type="image/x-icon" />

<style>
    html,body {
margin: 0;
height: 100%;
background-color: #5a4e4e ;
background-size: cover;
}
.log-in {
position: relative;
width: 18rem;
top: calc(50% - 9.25rem);
margin: auto;
font-family: 'Roboto', sans-serif;
font-weight: 300;
text-align: center;
}
.title {

    display: flex;
    margin: 0 0 1.5rem;
    padding: 5px;
    font-size: 32px;
    line-height: -1;
    font-weight: 300;
    color: #e0e1e5;
}
.input {
box-sizing: border-box;
display: block;
margin-top:5px;
margin-bottom:30px;
padding-top: 2px;
width: 100%; height: 3rem;
appearance: none;
font-family: 'Roboto', sans-serif;
font-size: 1.2rem;
font-weight: 300;
color: #556;
text-align: center;
border: 0;
border-radius: 1.5rem;
background: #fff;
}
.submit {
margin-bottom: .6rem;
font-weight: 500;
cursor: pointer;
color: #fff;
background: #00B0FF;
transition: 200ms;
}
.submit:hover {
background: #10C0FF;
}
.forgot {
color: #ddd;
text-decoration: none;
font-size: .9rem;
}
.forgot:hover {
color: #fff;
text-decoration: none;
}


.label{
    margin-bottom: 20%;
    color: #0b9bcf;
}
#image{

    width: 50px;
    margin: 0px 10px;

}
</style>
</head>
<body>
<form class="log-in" action="{{ route('login') }}" method="POST">
    @csrf
    <div>
    <h1 class="title">{{ __(config('app.name')) }}</h1>
</div>
       <div id="msg">
        @error('email')
        <span style="color: red" class="text-red-500" role="alert">
            {{ $message }}
        </span>
       @enderror
        <input id="email" type="email" class="input" name="email"
          value="{{ old('email') }}"
          placeholder="Enter your Email"
          autocomplete="email"
          autofocus>

    </div>
    <div id="msg" >
        @error('password')
        <span style="color: red" class="text-red-500" role="alert">
            {{ $message }}
        </span>
@enderror
        <input
          type="password"
          name="password"
          placeholder="Enter Password"
          class="input"
        >

    </div>

    @if (Route::has('password.request'))
    <div class="text-right mt-5 ">
        <a href="{{ route('password.request') }}"
            class="forgot">Forgot
            Password?</a>
    </div>
    @endif
  <button class="input submit"type="submit" >Log in</button>
  <p class="mt-8" style="color: #f9f9f9; font-size: 20px;">Need an account? <a href="{{ route('register') }}"
    style="color: rgb(193, 178, 178)">Create an
    account</a></p>

</form>
</body>
</html>
