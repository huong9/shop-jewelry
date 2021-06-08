@extends('layouts.main')
@section('title', 'Register')
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
                            <span class="page-title">Create Account</span>
                        </div>
                    </div>
                </div>
            </div>              
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">Register</h1> 
                        </div>
                        <div id="col-main" class="col-md-24 register-page clearfix">
                            <form method="post" id="create_customer" accept-charset="UTF-8">
                                @csrf
                                <input value="create_customer" name="form_type" type="hidden"><input name="utf8" value="✓" type="hidden">
                                <ul id="register-form" class="row list-unstyled">
                                    <li class="clearfix"></li>
                                    <li id="first_namef">
                                    <label class="control-label" for="first_name">Name <span class="req">*</span></label>
                                    <input name="name" id="first_name" class="form-control" type="text" oninvalid="this.setCustomValidity('Enter Name Here')"
                                    oninput="this.setCustomValidity('')" >
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="last_namef">
                                    <label class="control-label" for="last_name">Phone Number <span class="req">*</span></label>
                                    <input name="phone" id="last_name" class="form-control " type="number">
                                    @error('phone')
                                    <small class="help-block">{{$message}}</small>
                                    @enderror
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="emailf" class="">
                                    <label class="control-label" for="email">Your Email <span class="req">*</span></label>
                                    <input name="email" id="email" class="form-control " type="email" >
                                    @error('email')
                                    <small class="help-block">{{$message}}</small>
                                    @enderror
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="passwordf" class="">
                                    <label class="control-label" for="password">Your Password <span class="req">*</span></label>
                                    <input value="" name="password" id="password" class="form-control password" type="password">
                                    @error('password')
                                    <small class="help-block">{{$message}}</small>
                                    @enderror
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="passwordf" class="">
                                    <label class="control-label" for="confirm_password">Confirm Password <span class="req">*</span></label>
                                    <input id="confirm_password" class="form-control password" type="password">
                                    @error('confirm_password')
                                    <small class="help-block">{{$message}}</small>
                                    @enderror
                                    </li>
                                    <li class="clearfix"></li>
                                    <li class="unpadding-top action-last">
                                    <button class="btn" type="submit">Create an Account</button>
                                    </li>
                                </ul>
                            </form>
                        </div>   
                    </div>
                </div>
            </section>        
        </div>
    </div>
</div>
<script>
    var password = document.getElementById("password")
    var confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
@endsection