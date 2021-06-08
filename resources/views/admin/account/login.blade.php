@extends('layouts.main')
@section('title', 'Login')
@section('body')
<div id="content-wrapper-parent">
    <div id="content-wrapper">  
        <!-- Content -->
        <div id="content" class="clearfix">        
            <div id="breadcrumb" class="breadcrumb">
                <div itemprop="breadcrumb" class="container">
                    <div class="row">
                        <div class="col-md-24">
                            <a href="index.html" class="homepage-link" title="Back to the frontpage">Home</a>
                            <span>/</span>
                            <span class="page-title">Login</span>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">Login</h1> 
                        </div>
                        <div id="col-main" class="col-md-24 register-page clearfix">
                            <div class="row checkout-form">
                                <div class="col-md-12 row-left">
                                    <!-- Customer Account Login -->
                                    <div id="customer-login">
                                        <div class="checkout-title">
                                            <span class="general-title">Customer Login</span>
                                        </div>
                                        <form method="POST" id="customer_login" accept-charset="UTF-8">
                                            @csrf
                                            <input type="hidden" value="customer_login" name="form_type"><input type="hidden" name="utf8" value="✓">
                                            {{-- <div class="col-md-21 login-alert">
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close btooltip" data-toggle="tooltip" data-placement="top" title="" data-dismiss="alert" data-original-title="Close">×</button>
                                                    <div class="errors">
                                                        <ul>
                                                            <li>Invalid login credentials.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <ul id="login-form" class="list-unstyled">
                                                <li class="clearfix"></li>
                                                <li id="login_email" class="col-md-21">
                                                <label class="control-label" for="customer_email">Email Address <span class="req">*</span></label>
                                                <input type="email" name="email" id="customer_email" class="form-control">
                                                @error('email')
                                                <small class="help-block">{{$message}}</small>
                                                @enderror
                                                </li>
                                                <li class="clearfix"></li>
                                                <li id="login_password" class="col-md-21">
                                                <label class="control-label" for="customer_password">Password <span class="req">*</span></label>
                                                <input type="password" name="password" id="customer_password" class="form-control password">
                                                @error('password')
                                                <small class="help-block">{{$message}}</small>
                                                @enderror
                                                </li>
                                                <li class="col-md-21 unpadding-top">
                                                <ul class="login-wrapper list-unstyled">
                                                    <li>
                                                    <button class="btn" type="submit">Login</button>
                                                    </li>
                                                    <li>
                                                    <a class="action" href="{{ route('register') }}">Register</a>
                                                    </li>
                                                    <li>
                                                    or <a class="return" href="{{ route('home') }}">Return to store</a>
                                                    </li>
                                                </ul>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <!-- Password Recovery -->
                                    <div id="recover-password" style="display: none;">
                                        <div class="checkout-title">
                                            <span class="general-title">Reset Password</span>
                                            <span class="line"></span>
                                        </div>
                                        <p class="note">
                                            We will send you an email to reset your password.
                                        </p>
                                        <form method="post" action="http://demo.themeforshop.com/account/recover" accept-charset="UTF-8">
                                            <input type="hidden" value="recover_customer_password" name="form_type"><input type="hidden" name="utf8" value="✓">
                                            <ul id="recover-form" class="list-unstyled clearfix">
                                                <li class="clearfix"></li>
                                                <li id="recover_email" class="col-md-21">
                                                <label class="control-label">Email Address <span class="req">*</span></label>
                                                <input type="email" value="" name="email" id="recover-email" class="form-control">
                                                </li>
                                                <li class="col-md-21 unpadding-top">
                                                <ul class="login-wrapper list-unstyled">
                                                    <li>
                                                    <a class="action" href="javascript:;" onclick="hideRecoverPasswordForm()">Return to login?</a>
                                                    or <a class="return" href="index.html">Return to store</a>
                                                    </li>
                                                    <li>
                                                    <button class="btn btn-1" type="submit">Submit</button>
                                                    </li>
                                                </ul>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>        
        </div>
    </div>
</div>
@endsection