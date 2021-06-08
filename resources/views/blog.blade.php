@extends('layouts.main')
@section('title', 'Blogs')
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
                                <span class="page-title">Blogs</span>								
                            </div>
                        </div>
                    </div>
                </div>                
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div id="page-header" class="col-md-24">
                                <h1 id="page-title">Blogs</h1>
                            </div>
                            <div id="col-main" class="blog blog-page col-xs-24 col-sm-24 col-content col-content ">
                                <div class="blog-content-wrapper">
                                    @foreach ($blogs as $item)
                                    <div class="blogs clearfix">
                                        <article class="blogs-item">
                                            <div class="row">
                                                <div class="article-content col-md-24">
                                                    <div class="article-content-inner">
                                                        <div>
                                                            <div class="date">
                                                                <?php 
                                                                    $timestamp = strtotime($item->created_at);
                                                                    $date = date('d', $timestamp);
                                                                    $month = date('F', $timestamp);
                                                                ?>
                                                                <p>
                                                                    <small style="font-size: 13px">{{ $month }}</small><span>{{ $date }}</span>
                                                                </p>
                                                            </div>
                                                            <h4><a href="{{ route('blog.detail', [$id = $item->id, $slug = Str::slug($item->name)]) }}">{{ $item->name }}</a></h4>
                                                        </div>
                                                        <div class="blogs-image">
                                                            <ul class="list-inline">
                                                                <li><a href="{{ route('blog.detail', [$id = $item->id, $slug = Str::slug($item->name)]) }}"><img src="{{ url('public') }}/uploads/news/{{ $item->image }}" alt="{{ $item->name }}"></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="intro">
                                                            <p>
                                                                {{ $item->description }}
                                                            </p>
                                                        </div>
                                                        <ul class="post list-inline">
                                                            <li class="author">{{ $item->user->name }}</li>
                                                            <li>/</li>
                                                            <li class="comment">
                                                            <a href="#">
                                                            <span>{{ $item->comments->count() }}</span> Comment(s) </a>
                                                            </li>
                                                            <li class="post-action">
                                                            <a class="btn btn-1 enable hidden-xs" href="#" title="Add your thoughts">Post Comment</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>   
                                    </div>
                                    @endforeach
                                    
                                      

                                </div>
                                <div class="pagination clearfix">
                                    <ul class="list-inline">
                                        <li class="prev"><a class="disabled" href="javascript:;"><i class="fa fa-angle-double-left"></i>Previous</a></li>
                                        <li class="next"><a href="#">Next<i class="fa fa-angle-double-right"></i></a></li>
                                    </ul>
                                    <p class="pagination-num-showing hidden-xs">
                                         Showing 1 - 2 of 5 total
                                    </p>
                                </div> 
                            </div>
                            <!-- End of layout -->
                        </div>
                    </div>
                </section>        
            </div>
    </div>
</div>
@endsection