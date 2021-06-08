@extends('layouts.main')
@section('title', 'Search result')

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
                            <span class="page-title">Search</span>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div id="collection-content">
                            <div id="page-header">
                                <h1 id="page-title">Search</h1>
                            </div>
                            <div class="collection-warper col-sm-24 clearfix">
                                <div class="collection-panner">
                                    <img src="{{ url('resources') }}/assets/images/collection_banner.jpg" class="img-responsive" alt="">
                                </div>
                                <br>
                            </div>
                            <div class="collection-main-content">
                                <div id="prodcoll" class="col-sm-6 col-md-6 sidebar hidden-xs">
                                    <div class="group_sidebar">
                                        <div class="sb-wrapper">
                                            <!-- filter tags group -->
                                            <div class="filter-tag-group">
                                                <h6 class="sb-title">Filter</h6>
                                                <!-- gender -->
                                                <div class="tag-group" id="coll-filter-1">
                                                    <p class="title">
                                                        Gender
                                                    </p>
                                                    <ul>
                                                        <li><a  title="Narrow selection to products matching tag S"
                                                                href="{{ route('search', ['search_str' => request()->search_str, 'gender' => 'male']) }}" style="width: 70px"><span class="fe-checkbox" ></span> Male</a>
                                                        </li>
                                                        <li><a  title="Narrow selection to products matching tag M"
                                                            href="{{ route('search', ['search_str' => request()->search_str, 'gender' => 'female']) }}" style="width: 70px"><span class="fe-checkbox"></span> Female</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Color -->
                                                <div class="tag-group" id="coll-filter-2">
                                                    <p class="title">
                                                        Color
                                                    </p>
                                                    <ul>
                                                        @foreach ($colorAll as $item)
                                                        <li class="swatch-tag">
                                                            <span
                                                                style="background-color: {{ $item->hex_color }};"
                                                                class="btooltip filterColor" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                onclick="filterFunc('color','{{ $item->name }}')"
                                                                data-original-title="{{ $item->name }}">
                                                                <a href="{{ route('search', ['search_str' => request()->search_str,'color' => $item->name]) }}" title="Narrow selection to products matching tag {{ $item->name }}"></a>
                                                            </span>
                                                        </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                </div>

                                                <!-- price filter -->
                                                <div class="tag-group" id="coll-filter-3">
                                                    <p class="title">
                                                        Price
                                                    </p>
                                                    <div class="container-range">
                                                        <div class="row">
                                                          <div class="range-width">
                                                            <div id="slider-range"></div>
                                                          </div>
                                                        </div>
                                                        <div class="row slider-labels">
                                                          <div class="col-xs-6 caption">
                                                            <strong>Min:</strong> <span id="slider-range-value1"></span>
                                                          </div>
                                                          <div class="col-xs-6 text-right caption">
                                                            <strong>Max:</strong> <span id="slider-range-value2"></span>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <div class="range-width">
                                                            {{-- <form action="{{ route('search') }}"> --}}
                                                              <input type="hidden" id="min-value" name="from" >
                                                              <input type="hidden" id="max-value" name="to">
                                                              {{-- <br>
                                                              <button class="btn" onclick="filterPrice()">Filter</button> --}}
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      
                                                </div>

                                            </div>
                                        </div>
                                        {{-- cate list --}}
                                        <div class="home-collection-wrapper sb-wrapper clearfix">
                                            <h6 class="sb-title">Product Categories</h6>
                                            <ul class="list-unstyled sb-content list-styled">
                                                @foreach ($cates5 as $item)
                                                <li>
                                                    <a href="{{ route('getListView', [$id = $item['id'],$slug = $item['slug']]) }}"><span><i class="fa fa-circle"></i> {{ $item->name }}</span></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- best sale --}}
                                        <div class="deal-product-wrapper sb-wrapper clearfix">
                                            <div class="group_deal_products">
                                                <div class="">
                                                    <div class="home_deal_fp">
                                                        <h6 class="sb-title">Specials</h6>
                                                        <div class="home_deal_fp_wrapper sb-content">
                                                            <div id="home_deal_fp">
                                                                @foreach ($prodSale as $item)
                                                                <div class="element full_width fadeInUp animated" data-animate="fadeInUp" data-delay="0">
                                                                    <form action="#" method="post">
                                                                        <ul class="row-container list-unstyled clearfix">
                                                                            <li class="row-left">
                                                                            <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}" class="container_item">
                                                                            <img src="{{ url('public') }}/uploads/prods/{{ $item['image'] }}" class="img-responsive" alt="Curabitur cursus dignis">
                                                                            </a>
                                                                            </li>
                                                                            <li class="row-right parent-fly animMix">
                                                                            <a class="title-5" href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}">{{ $item->name }}</a>
                                                                            <div class="product-price">
                                                                                @if ($item['discount'] > 0)
                                                                                <span class="price_sale">${{ (int)($item['price']-($item['price']*$item['discount'])/100) }}</span>
                                                                                <del class="price_compare"> ${{ $item['price'] }}</del>
                                                                                @else
                                                                                <span class="price">${{ $item['price'] }}</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="effect-ajax-cart">
                                                                                <input name="quantity" value="1" type="hidden">
                                                                                <button class="select-option" type="button" onclick="window.location.href='{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}'">Detail</button>
                                                                            </div>
                                                                            </li>
                                                                        </ul>
                                                                    </form>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sb-wrapper">
                                            <h6 class="sb-title">Welcome</h6>
                                            <ul class="list-unstyled sb-content textwidget list-styled">
                                                <li>
                                                    <p>
                                                        Porro quisquam est, qui dolorem ipsum sitet dolor sit amet,
                                                        consectetur, adipisci velit, sed quia non numquam eius modi
                                                        tempora labore et dolore eut aliquam quaerat
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="sb-item slidebar-banner">
                                            <h6 class="sb-title">Promotion</h6>
                                            <div class="">
                                                <img src="{{ url('resources') }}/assets/images/blog-slidebar-banner.jpg" alt="">
                                            </div>
                                        </div>
                                        <!--End sb-item-->
                                    </div>
                                    <!--end group_sidebar-->
                                </div>
                                <div id="col-main"
                                    class="collection collection-page col-sm-18 col-md-18 no_full_width have-left-slidebar">
                                    <div class="container-nav clearfix">
                                        <div id="options" class="container-nav clearfix">
                                            <ul class="list-inline text-right">
                                                <li class="grid_list">
                                                    <ul class="list-inline option-set hidden-xs"
                                                        data-option-key="layoutMode">
                                                        <li data-original-title="Grid" data-option-value="fitRows"
                                                            id="goGrid" class="goAction btooltip active"
                                                            data-toggle="tooltip" data-placement="top" title="">
                                                            <span></span>
                                                        </li>
                                                        <li data-original-title="List"
                                                            data-option-value="straightDown" id="goList"
                                                            class="goAction btooltip" data-toggle="tooltip"
                                                            data-placement="top" title="">
                                                            <span></span>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sortBy">
                                                    <div id="sortButtonWarper" class="dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <strong class="title-6">View as</strong>
                                                        <button id="sortButton">
                                                            <span class="name">Featured</span><i
                                                                class="fa fa-caret-down"></i>
                                                        </button>
                                                        <i class="sub-dropdown1"></i>
                                                        <i class="sub-dropdown"></i>
                                                    </div>
                                                    <div id="sortBox" class="control-container dropdown-menu">
                                                        <ul id="sortForm"
                                                            class="list-unstyled option-set text-left list-styled"
                                                            data-option-key="sortBy">
                                                            <li class="sort" onclick="sortLtH()" data-option-value="price-ascending"
                                                                data-order="asc">Price: Low to High</li>
                                                            <li class="sort" onclick="sortHtL()"  data-option-value="price-descending"
                                                                data-order="desc">Price: High to Low</li>
                                                            <li class="sort" id="sortAtZ" data-option-value="title-ascending"
                                                                data-order="asc">A-Z</li>
                                                            <li class="sort" id="sortZtA" data-option-value="title-descending"
                                                                data-order="desc">Z-A</li>
                                                            <li class="sort" id="sortOtN" data-option-value="created-ascending"
                                                                data-order="asc">Oldest to Newest</li>
                                                            <li class="sort" id="sortNtO" data-option-value="created-descending"
                                                                data-order="desc">Newest to Oldest</li>
                                                            <li class="sort" id="sortBs" data-option-value="best-selling">Best
                                                                Selling</li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="sandBox-wrapper" class="group-product-item row collection-full">
                                        @if ($prodSearch->count() == 0)
                                            <div class="text-center">
                                                <br>
                                                <br>
                                                <img width="40%" src="{{ url('resources') }}/assets/images/not-found.png" alt="OutOfStock">
                                                <br>
                                                <br>
                                                <h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Rất tiếc! Chúng tôi không thể tìm thấy kết quả bạn cần</h2>
                                            </div>
                                        @endif
                                        <ul id="sandBox" class="list-unstyled list-prod-parent">
                                            @foreach ( $prodSearch as $item)
                                            <li class="element first no_full_width element-items prod-normal"
                                            data-alpha="Curabitur cursus dignis" data-price="{{ $item['price'] }}">
                                                <ul class="row-container list-unstyled clearfix"
                                                data-sort='{{ (int)($item['price']-($item['price']*$item['discount'])/100) }}'>
                                                    <li class="row-left">
                                                        <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}" class="container_item">
                                                            <img src="{{ url('public') }}/uploads/prods/{{ $item['image'] }}"
                                                                class="img-responsive getImg"
                                                                alt="Curabitur cursus dignis">
                                                            @if ($item['discount'] > 0)
                                                            <span class="sale_banner">
                                                                <span class="sale_text">Sale</span>
                                                            </span>
                                                            @endif
                                                        </a>
                                                        <div class="hbw">
                                                            <span class="hoverBorderWrapper"></span>
                                                        </div>
                                                    </li>
                                                    <li class="row-right parent-fly animMix">
                                                        <div class="product-content-left">
                                                            <a class="title-5 getName" href="product.html">{{ $item['name'] }}</a>
                                                            <span class="spr-badge" id="spr_badge_129323821155"
                                                                data-rating="0.0">
                                                                <span class="spr-starrating spr-badge-starrating"><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i></span>
                                                                <span class="spr-badge-caption">
                                                                    No reviews </span>
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="product-content-right">
                                                            <div class="product-price">
                                                                @if ($item['discount'] > 0)
                                                                    <span class="price_sale price-final">${{ (int)($item['price']-($item['price']*$item['discount'])/100) }}</span>
                                                                    <del class="price_compare"> ${{ $item['price'] }}</del>
                                                                    @else
                                                                    <span class="price price-final">${{ $item['price'] }}</span>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        <div class="list-mode-description getDes">
                                                            {{ $item['description'] }}
                                                        </div>
                                                        <div class="hover-appear">
                                                            
                                                            <div onclick="getProdDetail({{ $item['id'] }})" class="product-ajax-qs hidden-xs hidden-sm ">
                                                                <div data-handle="curabitur-cursus-dignis"
                                                                    data-target="#quick-shop-modal"
                                                                    class="quick_shop quick-view-handle" data-toggle="modal">
                                                                    <i id="quich-view-i" class="fa fa-eye"
                                                                        title="Quick view"></i><span
                                                                        class="list-mode">Quick View</span>

                                                                </div>
                                                            </div>
                                                            {{-- wishlist --}}
                                                            

                                                            @if (Auth::check())
                                                            
                                                            @php
                                                            $wlID = 0;
                                                            @endphp

                                                            @foreach ($wishlist as $item2)
                                                                @if ($item2->prod->id == $item->id)
                                                                    @php
                                                                        $wlID = $item2->prod->id;
                                                                    @endphp
                                                                    
                                                                @endif
                                                            @endforeach

                                                            @if ($item->id == $wlID)
                                                            <span data-user="{{ Auth::user()->id }}" class="wish-list wish-list-heart{{ $item->id }} wishlist-liked" onclick="addWishlist({{ $item->id }})"
                                                                title="wish list"><i id="wishlist-heart-icon{{ $item->id }}" class="fa fa-heart"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @else
                                                            <span data-user="{{ Auth::user()->id }}" class="wish-list wish-list-heart{{ $item->id }}" onclick="addWishlist({{ $item->id }})"
                                                                title="wish list"><i id="wishlist-heart-icon{{ $item->id }}" class="fa fa-heart-o"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @endif
                                                                
                                                            @else
                                                            <span class="wish-list" id="wish-list-heart" onclick="window.location.href='{{ route('login') }}'"
                                                                title="wish list"><i class="fa fa-heart-o"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @endif
                                                            {{-- end wishlist --}}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach
                                            @foreach ( $prod_est as $item)
                                            <li class="element first no_full_width element-items prod-est dp-none"
                                            data-alpha="Curabitur cursus dignis" data-price="{{ $item['price'] }}">
                                                <ul class="row-container list-unstyled clearfix"
                                                data-sort='{{ (int)($item['price']-($item['price']*$item['discount'])/100) }}'>
                                                    <li class="row-left">
                                                        <a href="{{ route('getListView', [$id = $item['id'],$slug = Str::slug($item['name'])]) }}" class="container_item">
                                                            <img src="{{ url('public') }}/uploads/prods/{{ $item['image'] }}"
                                                                class="img-responsive getImg"
                                                                alt="Curabitur cursus dignis">
                                                            @if ($item['discount'] > 0)
                                                            <span class="sale_banner">
                                                                <span class="sale_text">Sale</span>
                                                            </span>
                                                            @endif
                                                        </a>
                                                        <div class="hbw">
                                                            <span class="hoverBorderWrapper"></span>
                                                        </div>
                                                    </li>
                                                    <li class="row-right parent-fly animMix">
                                                        <div class="product-content-left">
                                                            <a class="title-5" href="product.html">{{ $item['name'] }}</a>
                                                            <span class="spr-badge" id="spr_badge_129323821155"
                                                                data-rating="0.0">
                                                                <span class="spr-starrating spr-badge-starrating"><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i><i
                                                                        class="spr-icon spr-icon-star-empty"
                                                                        style=""></i></span>
                                                                <span class="spr-badge-caption">
                                                                    No reviews </span>
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="product-content-right">
                                                            <div class="product-price">
                                                                @if ($item['discount'] > 0)
                                                                    <span class="price_sale price-final">${{ (int)($item['price']-($item['price']*$item['discount'])/100) }}</span>
                                                                    <del class="price_compare"> ${{ $item['price'] }}</del>
                                                                    @else
                                                                    <span class="price price-final">${{ $item['price'] }}</span>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        <div class="list-mode-description getDes">
                                                            {{ $item['description'] }}
                                                        </div>
                                                        <div class="hover-appear">
                                                            
                                                            <div onclick="getProdDetail({{ $item['id'] }})" class="product-ajax-qs hidden-xs hidden-sm ">
                                                                <div data-handle="curabitur-cursus-dignis"
                                                                    data-target="#quick-shop-modal"
                                                                    class="quick_shop quick-view-handle" data-toggle="modal">
                                                                    <i id="quich-view-i" class="fa fa-eye"
                                                                        title="Quick view"></i><span
                                                                        class="list-mode">Quick View</span>

                                                                </div>
                                                            </div>
                                                            {{-- wishlist --}}
                                                            

                                                            @if (Auth::check())
                                                            
                                                            @php
                                                            $wlID = 0;
                                                            @endphp

                                                            @foreach ($wishlist as $item2)
                                                                @if ($item2->prod->id == $item->id)
                                                                    @php
                                                                        $wlID = $item2->prod->id;
                                                                    @endphp
                                                                    
                                                                @endif
                                                            @endforeach

                                                            @if ($item->id == $wlID)
                                                            <span data-user="{{ Auth::user()->id }}" class="wish-list wish-list-heart{{ $item->id }} wishlist-liked" onclick="addWishlist({{ $item->id }})"
                                                                title="wish list"><i id="wishlist-heart-icon{{ $item->id }}" class="fa fa-heart"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @else
                                                            <span data-user="{{ Auth::user()->id }}" class="wish-list wish-list-heart{{ $item->id }}" onclick="addWishlist({{ $item->id }})"
                                                                title="wish list"><i id="wishlist-heart-icon{{ $item->id }}" class="fa fa-heart-o"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @endif
                                                                
                                                            @else
                                                            <span class="wish-list" id="wish-list-heart" onclick="window.location.href='{{ route('login') }}'"
                                                                title="wish list"><i class="fa fa-heart-o"></i><span
                                                                    class="list-mode">Add to Wishlist</span></span>
                                                            @endif
                                                            {{-- end wishlist --}}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
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
<script src="{{ url('resources') }}/js/range-input.js" type="text/javascript"></script>
<script src="{{ url('resources') }}/js/sort.js" type="text/javascript"></script>

@endsection