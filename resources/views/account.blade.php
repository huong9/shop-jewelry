@extends('layouts.main')
@section('title', 'Account')
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
                            <span class="page-title">My Account</span>
                        </div>
                    </div>
                </div>
            </div>              
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">My Account</h1> 
                        </div>
                        <div class="col-sm-6 col-md-6 sidebar">
                            <div class="group_sidebar">
                                <div class="row sb-wrapper unpadding-top">
                                    <h6 class="sb-title">Account Details</h6>
                                    <span class="mini-line"></span>
                                    <ul id="customer_detail" class="list-unstyled sb-content">
                                        <li>
                                        <address class="clearfix">
                                        <div class="info">
                                            <i class="fa fa-user"></i>
                                            <span class="address-group">
                                            <span class="author">{{ Auth::user()->name }}</span>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                            </span>
                                        </div>
                                        <div class="address">
                                            <span class="address-group">
                                            <span class="address1">{{ Auth::user()->address }}<span class="phone-number"></span></span>
                                            </span>
                                        </div>
                                        </address>
                                        </li>
                                        <li>
                                        <button class="btn btn-1" id="view_address" onclick="window.location='{{ route('address') }}'">Manager Address (1)</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="col-main" class="account-page col-sm-18 col-md-18 clearfix">
                            <div id="customer_orders">
                                <h6 class="sb-title">Order history</h6>
                                <span class="mini-line"></span>
                                <div class="row wrap-table">
                                    <table class="table-hover">
                                    <thead>
                                    <tr>
                                        <th class="order_number">
                                            Order
                                        </th>
                                        <th class="date">
                                            Date
                                        </th>
                                        {{-- <th class="payment_status">
                                            Payment Status
                                        </th>
                                        <th class="fulfillment_status">
                                            Fulfillment Status
                                        </th> --}}
                                        <th class="total">
                                            Total
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach (Auth::user()->orders as $item)
                                        <tr class="odd ">
                                            <td>
                                                <a href="#" title="">#{{ $i }}</a>
                                            </td>
                                            <td>
                                                <span class="note">{{ $item->created_at }}</span>
                                            </td>
                                            {{-- <td>
                                                <span class="status_authorized">authorized</span>
                                            </td>
                                            <td>
                                                <span class="status_unfulfilled">unfulfilled</span>
                                            </td> --}}
                                            <td>
                                                <span style="color: black" class="total">${{ $item->total }}</span>
                                            </td>
                                            <th class="text-center">
                                                <a class="btn btn-danger" href="{{ route('order.cancel', [$id = $item->id]) }}">Cancel</a>
                                            </th>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    </table>
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