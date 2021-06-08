@extends('layouts.main')
@section('title', 'Checkout')
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
                        <div id="page-header" class="col-md-12">
                            <h1 id="page-title">Info</h1> 
                        </div>
                        <div id="page-header" class="col-md-12">
                            <h1 id="page-title">Cart</h1> 
                        </div>
                        <div id="col-main" class="col-md-12 register-page clearfix">
                            <form method="post" id="create_customer" accept-charset="UTF-8">
                                @csrf
                                <input value="create_customer" name="form_type" type="hidden"><input name="utf8" value="✓" type="hidden">
                                <ul id="register-form" class="row list-unstyled">
                                    <li class="clearfix"></li>
                                    <li id="first_namef">
                                    <label class="control-label" for="first_name">Name <span class="req">*</span></label>
                                    <input name="name" id="first_name" class="form-control" value="{{ Auth::user()->name }}" type="text" oninvalid="this.setCustomValidity('Enter Name Here')"
                                    oninput="this.setCustomValidity('')" required>
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="last_namef">
                                    <label class="control-label" for="last_name">Phone Number <span class="req">*</span></label>
                                    <input name="phone" id="last_name" value="{{ Auth::user()->phone }}" class="form-control" type="text" required>
                                    </li>
                                    <li class="clearfix"></li>
                                    <li id="emailf" class="">
                                    <label class="control-label" for="email">Your Email <span class="req">*</span></label>
                                    <input name="email" id="email" value="{{ Auth::user()->email }}" class="form-control " type="email" required>
                                    </li>
                                    
                                    <li class="clearfix"></li>
                                    <li id="addressff">
                                    <label class="control-label" for="first_name">Address <span class="req">*</span></label>
                                    <input name="address" id="addressff" value="{{ Auth::user()->address }}" class="form-control" type="text" required>
                                    </li>

                                    <li class="clearfix"></li>
                                    <li>
                                        <select style="width: 44.8%" name="calc_shipping_provinces" required="">
                                            <option value="">Tỉnh / Thành phố</option>
                                          </select>
                                          <select style="width: 44.8%" name="calc_shipping_district" required="">
                                            <option value="">Quận / Huyện</option>
                                          </select>
                                          <input class="billing_address_1" name="city" type="hidden" value="">
                                          <input class="billing_address_2" name="district" type="hidden" value="">
                                    </li><br>

                                    <div class="form-group mb-3">
                                        <label class="control-label"  for="validationTextarea">Note</label>
                                        <textarea name="note" class="form-control" id="validationTextarea"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label" style="margin-bottom: 5px" for="paymentzzz">Payment Methods</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="0" id="customRadio1" name="payment" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadio1">Thanh toán khi nhận hàng</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="1" id="customRadio2" name="payment" class="custom-control-input" >
                                            <label class="custom-control-label" for="customRadio2">Thanh toán qua hình thức chuyển khoản</label>
                                        </div>

                                    </div>
                                    <li class="clearfix"></li>
                                    <li class="unpadding-top action-last">
                                    <button class="btn" type="submit">Checkout</button>
                                    </li>
                                </ul>
                            </form>
                        </div>   
                        <div id="col-main" class="col-md-12 checkout-page clearfix">
                            <div id="cart-content">
                                <div  class="cart-mini-overflow">
                                @foreach ($cart->items as $item)
                                <div class="items control-container">
                                    <div class="row items-wrapper">
                                        <a class="cart-close" title="Remove" href="{{ route('cart.delete', [$id = $item['id']]) }}"><i class="fa fa-times"></i></a>
                                        <div class="col-md-8 cart-left">
                                            <a class="cart-image" href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}"><img width="100px" src="{{ url('public') }}/uploads/prods/{{ $item['image'] }}" alt="" title=""></a>
                                        </div>
                                        <div class="col-md-16 cart-right">
                                            <div class="cart-title">
                                                <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}">{{ $item['name'] }}</a>
                                            </div>
                                            <div>
                                                <span style="font-style: italic" class="variant_title">Size: {{ $item['size'] }}</span>
                                            </div>
                                            <div class="cart-price">
                                                ${{ number_format($item['price']) }}<span class="x"> x </span>{{ ($item['quantity']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                                    <div class="text-checkout">
                                        <p>total money: </p><p class="text-right">${{ $cart->total_price }}</p>
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
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js' type="text/javascript"></script>
<script src="{{ url('resources') }}/js/js.js" type="text/javascript" ></script>
@endsection