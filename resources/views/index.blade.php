@extends('layouts.main')
@section('title', 'Jewelry')

@section('body')
<div id="content-wrapper-parent">
    <div id="content-wrapper">  
        <!-- Main Slideshow -->
        <div class="home-slider-wrapper clearfix">
            <div class="camera_wrap" id="home-slider">
                <div data-src="{{ url('resources') }}/assets/images/slide-image-1.jpg">
                    <div class="camera_caption camera_title_1 fadeIn">
                      <a href="{{ route('collection') }}" style="color:#010101;">Live the moment</a>
                    </div>
                    <div class="camera_caption camera_caption_1 fadeIn" style="color: rgb(1, 1, 1);">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    </div>
                    <div class="camera_caption camera_image-caption_1 moveFromLeft">
                        <img src="{{ url('resources') }}/assets/images/slide-image-caption-1.png" alt="image_caption">
                    </div>
                    <div class="camera_cta_1">
                        <a href="{{ route('collection') }}" class="btn">See Collection</a>
                    </div>
                </div>
                <div data-src="{{ url('resources') }}/assets/images/slide-image-2.jpg">
                    <div class="camera_caption camera_title_2 moveFromLeft">
                      <a href="{{ route('collection') }}" style="color:#666666;">Love’s embrace</a>
                    </div>
                    <div class="camera_caption camera_image-caption_2 moveFromLeft" style="visibility: hidden;">
                        <img src="{{ url('resources') }}/assets/images/slide-image-caption-2.png" alt="image_caption">
                    </div>
                </div>
                <div data-src="{{ url('resources') }}/assets/images/slide-image-3.jpg">
                    <div class="camera_caption camera_image-caption_3 moveFromLeft">
                        <img src="{{ url('resources') }}/assets/images/slide-image-caption-3.png" alt="image_caption">
                    </div>
                </div>
            </div>
        </div> 
        <!-- Content -->
        <div id="content" class="clearfix">                       
            <section class="content">  
                <div id="col-main" class="clearfix">
                    <div class="home-popular-collections">
                        <div class="container">
                            <div class="group_home_collections row">
                                <div class="col-md-24">
                                    <div class="home_collections">
                                        <h6 class="general-title">Popular Collections</h6>
                                        <div class="home_collections_wrapper">												
                                            <div id="home_collections">
                                                @foreach ($cateList as $item)
                                                <div class="home_collections_item">
                                                    <div class="home_collections_item_inner">
                                                        <div class="collection-details">
                                                            <a href="{{ route('getListView', [$id = $item['id'],$slug = $item['slug']]) }}" title="{{ $item['name'] }}">
                                                                <img src="{{ url('public') }}/uploads/cate/{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                                            </a>
                                                        </div>
                                                        <div class="hover-overlay">
                                                            <span class="col-name"><a href="collection.html">{{ $item['name'] }}</a></span>
                                                            <div class="collection-action">
                                                                <a href="collection.html">See the Collection</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                            
                                                            
                                                </div>													
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                      $(document).ready(function() {
                                        $('.collection-details').hover(
                                          function() {
                                            $(this).parent().addClass("collection-hovered");
                                          },
                                          function() {
                                          $(this).parent().removeClass("collection-hovered");
                                          });
                                      });
                                    </script>
                                </div>
                            </div>
                    </div>
                    <div class="home-newproduct">
                        <div class="container">
                            <div class="group_home_products row">
                                <div class="col-md-24">
                                    <div class="home_products">
                                        <h6 class="general-title">New Products</h6>
                                        <div class="home_products_wrapper">
                                            <div id="home_products">
                                                @foreach ($prod as $item)
                                                <div class="element no_full_width col-md-8 col-sm-8 not-animated" data-animate="fadeInUp" data-delay="0">
                                                    <ul class="row-container list-unstyled clearfix">
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
                                                                        <span class="price_sale">${{ (int)($item['price']-($item['price']*$item['discount'])/100) }}</span>
                                                                        <del class="price_compare"> ${{ $item['price'] }}</del>
                                                                        @else
                                                                        <span class="price">${{ $item['price'] }}</span>
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
                                                </div> 
                                                @endforeach
                                                               
                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-banner-wrapper">
                        <div class="container">
                            <div id="home-banner" class="text-center clearfix">
                                <img class="pulse img-banner-caption" src="{{ url('resources') }}/assets/images/home_banner_image_text.png" alt="">
                                <div class="home-banner-caption">
                                    <p>
                                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                                         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                                <div class="home-banner-action">
                                    <a href="collection.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-blog">
                        <div class="container">
                            <div class="home-promotion-blog row">
                                <h6 class="general-title">Latest News</h6>
                                <div class="home-bottom_banner_wrapper col-md-12">
                                    <div id="home-bottom_banner" class="home-bottom_banner">
                                        <a href="{{ route('collection') }}"><img src="{{ url('resources') }}/assets/images/home_bottom_banner.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="home-blog-wrapper col-md-12">
                                    <div id="home_blog" class="home-blog">
                                        @foreach ($blogs3 as $item)
                                        <?php 
                                            $timestamp = strtotime($item->created_at);
                                            $date = date('d', $timestamp);
                                            $month = date('F', $timestamp);
                                        ?>
                                        <div class="home-blog-item row">
                                            <div class="date col-md-4">
                                                <div class="date_inner">
                                                    <p>
                                                        <small style="font-size: 15px">{{ $month }}</small><span>{{ $date }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="home-blog-content col-md-20">
                                                <h4><a href="{{ route('blog.detail', [$id = $item->id, $slug = Str::slug($item->name)]) }}">{{ $item->name }}</a></h4>
                                                <ul class="list-inline">
                                                    <li class="author"><i class="fa fa-user"></i> {{ $item->user->name }}</li>
                                                    <li>/</li>
                                                    <li class="comment">
                                                    <a href="article-left-2.html">
                                                    <span><i class="fa fa-pencil-square-o"></i> {{ $item->comments->count() }}</span> Comments </a>
                                                    </li>
                                                </ul>
                                                <div class="intro lines-limit">
                                                        {{ $item->description }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-feature">
                        <div class="container">
                            <div class="group_featured_products row">
                                <div class="col-md-24">
                                    <div class="home_fp">
                                        <h6 class="general-title">Featured Products</h6>
                                        <div class="home_fp_wrapper">
                                            <div id="home_fp">
                                                @foreach ($prod_est as $item)
                                                <div class="element no_full_width not-animated" data-animate="fadeInUp" data-delay="0">
                                                <ul class="row-container list-unstyled clearfix">
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
                                                                    <span class="price_sale">${{ (int)($item['price']-($item['price']*$item['discount'])/100) }}</span>
                                                                    <del class="price_compare"> ${{ $item['price'] }}</del>
                                                                    @else
                                                                    <span class="price">${{ $item['price'] }}</span>
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
                                                </div>
                                                @endforeach

                                                														  			  			
			                          
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home-partners">
                        <div class="container">
                            <div class="partners-logo row">
                                <div class="col-md-24">
                                    <div id="partners-container" class="clearfix">
                                        <h6 class="general-title">Popular Brands</h6>
                                        <div id="partners">
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="150">
                                                            <a class="animated" href="{{ route('collection') }}">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_1.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="300">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_2.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="450">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_3.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="600">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="750">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="900">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_6.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="logo text-center not-animated" data-animate="bounceIn" data-delay="1050">
                                                            <a class="animated" href="{{ route('collection') }} ">
                                                            <img class="pulse" src="{{ url('resources') }}/assets/images/partners_logo_7.png" alt="">
                                                            </a>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>  				            
                </div>
            </section>        
        </div>
    </div>
</div>
@endsection
@section('popupIndex')
<div class="newsletter-popup" style="display: none;">
    <form action="{{ route('newsletter') }}" method="get" name="mc-embedded-subscribe-form" target="_blank">
        <h4>-50% Deal</h4>
        <p class="tagline">
            subscribe for newsletter and get the item for 50% off
        </p>
        <div class="group_input">
            <input class="form-control" type="email" name="email" placeholder="YOUR EMAIL">
            <button class="btn" type="submit"><i class="fa fa-paper-plane"></i></button>
        </div>
    </form>
    <div id="popup-hide">
        <input type="checkbox" id="mc-popup-hide" value="1" checked="checked"><label for="mc-popup-hide">Never show this message again</label>
    </div>
</div>

<script src="{{ url('resources') }}/assets/javascripts/cs.global.js" type="text/javascript"></script>


<!--Androll-->
<script type="text/javascript">
adroll_adv_id = "HTF7KIWJRBHHXL46WLUDBC";
adroll_pix_id = "IE5CHDRTR5ABXH2P6QXAVM";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>

<!-- Google Code -->
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-55571446-8', 'auto');

  ga('require', 'displayfeatures');
  
  ga('set', 'dimension1', 'html_jewelry');
     
  ga('set', 'dimension2', 'html_jewelry');

  ga('send', 'pageview');

</script>
@endsection