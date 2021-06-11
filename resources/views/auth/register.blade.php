@extends('layouts.frontend_layout')
@section('frontendContent')


@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/custom_login.css') }}">


@endpush

@include('frontend.MainNav')



<!-- Contact Form -->


<div class="container login-container">
    <div id="logreg-forms">
        <form class="form-signin" action="{{ route('register') }}" method='post'>
            @csrf
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign Up</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign
                        in
                        with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign
                        in
                        with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR </p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <input name="name" type="text" id="inputEmail" class="form-control" placeholder="Email address" required=""
                autofocus="">
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address"
                required="" autofocus="">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password"
                required="">
            <input name="password_confirmation" type="password" id="inputPassword" class="form-control"
                placeholder="Password" required="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="{{ route('password.request') }}" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <a href="{{ route('login') }}" class="btn btn-primary btn-block text-light"><i class="fas fa-user-plus"></i>
                Already have a account ? login </a>
        </form>



    </div>
</div>



@endsection
