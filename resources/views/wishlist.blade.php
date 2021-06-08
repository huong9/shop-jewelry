@extends('layouts.main')
@section('title', 'Wish list')
@section('body')
<div id="content-wrapper-parent">
    <div id="content-wrapper">  
        <!-- Content -->
        <div id="content" class="clearfix">                
            <div id="breadcrumb" class="breadcrumb">
                <div itemprop="breadcrumb" class="container">
                    <div class="row">
                        <div class="col-md-24">
                            <a href="{{ route('home') }}" class="homepage-link" title="Back to the frontpage">Home</a>
                            <span>/</span>
                            <span class="page-title">Wishlist Page</span>
                        </div>
                    </div>
                </div>
            </div>        
            
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="page-header" class="col-md-24">
                            <h1 id="page-title">Wishlist Page</h1>
                        </div>
                        <div id="col-main" class="col-md-24 clearfix">
                            <div class="page page-wishlist">
                                <div class="table-cart">
                                    <div class="wrap-table">
                                        @if (Auth::check())
                                        @if ($wishlist->count() > 0)
                                        <table class="cart-items haft-border">
                                        <thead>
                                        <tr class="top-labels">
                                            <th class="text-left">
                                                Items
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Remove
                                            </th>
                                            {{-- <th>
                                                Add to Cart
                                            </th> --}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wishlist as $item)
                                            <form action="{{ route('cart.add') }}" method="get">
                                                <tr class="item wishlist-item">
                                                    <td class="title text-left">
                                                        <ul class="list-inline">
                                                            <li class="image">
                                                            <a class="image text-left" href="{{ route('getListView', [$id = $item->prod['id'],$slug = Str::slug($item->prod['name'])]) }}">
                                                                <img width="100px" src="{{ url('public') }}/uploads/prods/{{$item->prod->image }}" alt="Donec justo condimentum"></a>
                                                            </li>
                                                            <li class="link">
                                                            <a class="title text-left" href="{{ route('getListView', [$id = $item->prod['id'],$slug = Str::slug($item->prod['name'])]) }}">{{ $item->prod->name }}</a>
                                                            </li>
                                                                
                                                        </ul>
                                                    </td>
                                                    <td class="title-1">
                                                        ${{ number_format($item->prod['price']) }}
                                                    </td>
                                                    <td class="action">
                                                        <button type="button" onclick="window.location='{{ route('wishlist.delete', [$id = $item['id']]) }}'"><i class="fa fa-times"></i></button>
        
                                                    </td>
                                                    {{-- <td>
                                                        <input type="hidden" name="size" value="10">
                                                            <input type="hidden" name="id" value="{{ $item->product_id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <input class="btn" type="submit" value="Add to Cart" style="opacity: 1;">
                                                    </td> --}}
                                                </tr>
                                                </form>
                                            @endforeach    
                                        </tbody>
                                        </table>
                                        @else
                                        <div class="text-center">
                                                    <br>
                                                    <p>Hãy <i class="fa fa-heart"></i> sản phẩm bạn yêu thích khi mua sắm để xem lại thuận tiện nhất</p>
                                                    <br>
                                                    <a style="width: 170px" class="btn" href="{{ route('collection') }}">COLLECTION</a>
                                                    <br>
                                        </div>
                                            @endif
                                        @else
                                        <div class="text-center">
                                            <br>
                                            <p>Bạn cần đăng nhập để xem danh sách yêu thích của mình</p>
                                            <br>
                                            <a style="width: 170px" class="btn" href="{{ route('login') }}">LOGIN</a>
                                            <br>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /#col-main -->
                        </div>
                    </div>
                </div>
            </section>        
        </div>
    </div>
</div>
@endsection