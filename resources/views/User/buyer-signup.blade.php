@extends('layouts.login')
@section('content')
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{url('/buyer-signup')}}" method="post">
        {{ csrf_field() }}
        <div class="logo" style="margin: 0 auto; padding-bottom: 0;">
            <a href="index.html">
                <img src="/img/logo.png" width="300" alt="" /> 
            </a>
        </div>
        <h3 class="form-title font-green" style="margin-top: 5px;">Sign Up Buyer</h3>
        <div class="row">
             @include('partials/message')
        </div>
        <div class="form-group">
            <label class="control-label ">Account Type</label>
            <select class="form-control form-control-solid placeholder-no-fix " 
                   autocomplete="off"  name="account_type" > 
                   <option value=''> Please Select</option>
                   @foreach(StaticArray::$account_types as $key => $value)
                   <option value="{{$key}}">{{$value}}</option>
                   @endforeach

                   
            </select>
				   @if ($errors->has('account_type'))
			<span class="error text-danger">{{ $errors->first('account_type') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Company Name</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="text" 
				   autocomplete="off" placeholder="Company Name" name="company_name" /> 
				   @if ($errors->has('company_name'))
			<span class="error text-danger">{{ $errors->first('company_name') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Registration Number</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="text" 
				   autocomplete="off" placeholder="Registration Number" name="registration_number" /> 
				   @if ($errors->has('registration_number'))
			<span class="error text-danger">{{ $errors->first('registration_number') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="email" 
				   autocomplete="off" placeholder="Email" name="email" /> 
				   @if ($errors->has('email'))
			<span class="error text-danger">{{ $errors->first('email') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Contact Name</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="text" 
				   autocomplete="off" placeholder="Contact Name" name="name" /> 
				   @if ($errors->has('name'))
			<span class="error text-danger">{{ $errors->first('name') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="password" 
				   autocomplete="off" placeholder="Password" name="password" /> 
				   @if ($errors->has('password'))
			<span class="error text-danger">{{ $errors->first('password') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label class="control-label ">Confirm Password</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="password" 
				   autocomplete="off" placeholder="confirm_password" name="confirm_password" /> 
				   @if ($errors->has('confirm_password'))
			<span class="error text-danger">{{ $errors->first('confirm_password') }}</span>
			@endif
        </div>

        <div class="form-actions">
            <button type="submit" class="btn login-btn green uppercase">Register</button>
         
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
            <span class="fgperror text-danger"></span>
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
