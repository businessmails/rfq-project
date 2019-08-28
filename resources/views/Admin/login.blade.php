@extends('layouts.login')

@section('content')
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{url('/admin/login')}}" method="post">
        {{ csrf_field() }}
        <div class="logo" style="margin: 0 auto; padding-bottom: 0;">
            <a href="index.html">
                <img src="/img/logo.png" width="300" alt="" /> 
            </a>
        </div>
        <h3 class="form-title font-green" style="margin-top: 5px;">Sign In Admin</h3>
        <div class="row">
             @include('partials/message')
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix email" type="text" 
                   autocomplete="off" placeholder="Email" name="email" 
                   value="<?php if (isset($_COOKIE["email"])) {echo $_COOKIE["email"];}?>" /> 
            <span class="email-error text-danger"></span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control password form-control-solid placeholder-no-fix password" type="password" 
                   value="<?php if (isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>"
                   autocomplete="off" placeholder="Password" name="password" /> 
            <span class="password-error text-danger"></span>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn login-btn green uppercase">Login</button>
         
            {{-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> --}}
        </div>
    </form>
    <!-- END LOGIN FORM -->

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgot-pwd-form" class="forget-form" method="post"  >
        <p class="success-res alert-success"></p>
        <p class="failure-res alert-danger"></p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h3 class="font-green">Forgot Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control fgp-email" type="email"  placeholder="Email" name="email" /> 
            <span class="fgpEmail-error text-danger"></span>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <!--<input type="submit" class="btn-forgot btn btn-success uppercase pull-right" value="Submit">-->
            <button type="button" class="btn-forgot btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
@endsection
@push('view-scripts')
@endpush
