@extends('layouts.main')
@section('title', 'Cart')
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
                            <span class="page-title">Your Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>        
            
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">Shopping Cart</h1>
                        </div>
                        <div id="col-main" class="col-md-24 cart-page content">
                            @if (count($cart->items) > 0)
                            <form action="{{ route('cart.update') }}" method="get" id="cartform" class="clearfix">
                                <div class="row table-cart">
                                    <div class="wrap-table">
                                        <table class="cart-items haft-border">
                                        <colgroup>
                                        <col class="checkout-image">
                                        <col class="checkout-info">
                                        <col class="checkout-price">
                                        <col class="checkout-quantity">
                                        <col class="checkout-totals">
                                        </colgroup>
                                        <thead>
                                        <tr class="top-labels">
                                            <th>
                                                Items
                                            </th>
                                            <th>
                                                Size
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Qty
                                            </th>
                                            <th>
                                                SubTotal
                                            </th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($cart->items as $item)
                                            <tr class="item {{ Str::slug($item['name']) }}">
                                                <td class="title text-left">
                                                    <ul class="list-inline">
                                                        <li class="image">
                                                        <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}">
                                                        <img width="100px" src="{{ url('public') }}/uploads/prods/{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                                        </a>
                                                        </li>
                                                        <li class="link">
                                                        <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}">
                                                        <span class="title-5">{{ $item['name'] }}</span>
                                                        </a>
                                                        <br>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="selector-wrapper">
                                                        <div class="wrapper">
                                                            <select class="single-option-selector" name="size" style="z-index: 1000; font-size: 15px; width: auto">
                                                                @foreach ($sizeAll as $item2)
                                                                @if ($item2->name == $item['size'])
                                                                <option value="{{ $item2->name }}" selected>{{ $item2->name }}</option>
                                                                    
                                                                @else
                                                                <option value="{{ $item2->name }}">{{ $item2->name }}</option>
                                                                    
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="title-1">
                                                    ${{ number_format($item['price']) }}
                                                </td>
                                                <td>
                                                        <input class="form-control input-1 replace" maxlength="1" size="1" id="updates_3947646083" name="{{ $item['id'] }}" value="{{ $item['quantity'] }}">
                                                </td>
                                                <td class="total title-1">
                                                    {{ $item['price']*$item['quantity'] }}
                                                </td>
                                                <td class="action">
                                                    <button type="button" onclick="window.location='{{ route('cart.delete', [$id = $item['id']]) }}'"><i class="fa fa-times"></i>Remove</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="bottom-summary">
                                            <td>
                                                &nbsp;
                                            </td>
                                            <td>
                                                &nbsp;
                                            </td>
                                            <td class="update-quantities">
                                                <button type="submit" id="update-cart" class="btn btn-2">Update</button>
                                            </td>
                                            <td class="subtotal title-1">
                                                @foreach ($cart->items as $item)
                                                    
                                                @endforeach
                                            </td>
                                            <td>
                                                &nbsp;
                                            </td>
                                        </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix">
                                <div id="checkout-proceed" class="last1 text-right">
                                    <button class="btn" type="submit" id="checkout" onclick="window.location='{{ route('checkout') }}'">Proceed to Checkout</button>
                                </div>
                            </div>
                            @else
                            <div class="text-center">
                                <img height="300px" src="{{ url('resources') }}/assets/images/cart-empty.png" alt="">
                                    <br>
                                    <br>
                                    <p>Không có sản phẩm nào trong giỏ hàng của bạn.
                                    </p>
                                    <br>
                                    <a style="width: 170px" class="btn" href="{{ route('home') }}">SHOPPING NOW!</a>
                                    <br>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>        
        </div>
    </div>
</div>
@endsection