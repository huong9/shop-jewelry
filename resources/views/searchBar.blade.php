@extends('layouts.main')
@section('title', 'Search')
@section('body')

            
            <div id="content-wrapper-parent">
                <div id="content-wrapper">  
                    <!-- Content -->
                    <div id="content" class="clearfix">
                            <div id="widget-newsletter" class="search-bar-container">
                            <h1 class="search-bar-title">Search</h1>  

                                <div class="container">            
                                    <div class="newsletter col-md-24" id="searchletter">
                                        <form action="{{ route('search') }}" method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
                                        <div class="group_input">
                                            <input class="form-control"  placeholder="Search something..." type="text" name="search_str" id="email-input">
                                            <div class="unpadding-top"><button class="btn btn-1" type="submit"><i class="fa fa-search"></i></button></div>
                                        </div>              
                                        </form>
                                    </div>						
                                </div>
                        </div>
                    
                    </div>
                </div>
            </div>
@endsection