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
                            <a href="{{ redirect()->back() }}" class="homepage-link" title="Back to the frontpage">Home</a>							
                            <span>/</span>
                            <a href="blog.html" title="">Blogs</a>
                            <span>/</span>
                            <span class="page-title">{{ $blog->name }}</span>						
                        </div>
                    </div>
                </div>
            </div>                
            <section class="content">
                <div class="container">
                    <div class="row">
                        <br>
                        <div id="col-main" class="blog article-page col-xs-24 col-sm-18 ">
                            <div class="article">
                                <article class="blogs-item">
                                    <div class="row">
                                        <div class="article-content col-md-24">
                                            <div>
                                                <div class="date">
                                                    <?php 
                                                        $timestamp = strtotime($blog->created_at);
                                                        $date = date('d', $timestamp);
                                                        $month = date('F', $timestamp);
                                                        function commentTime($time)
                                                        {
                                                            $timeStr = "";
                                                            $timestamp2 = strtotime($time);
                                                            $commentTime = date('d M, Y', $timestamp2);
                                                            $delta_time = time() - strtotime($time);
                                                            $hours = floor($delta_time / 3600);
                                                            $delta_time %= 3600;
                                                            $minutes = floor($delta_time / 60);
                                                            if($hours > 24 && $hours < 1300) {
                                                                $hours = (int)($hours / 24);
                                                                if ($hours > 1) {
                                                                    return $timeStr = "{$hours} days ago";
                                                                }
                                                                else {
                                                                    return $timeStr = "{$hours} day ago";
                                                                }
                                                            }
                                                            elseif ($hours <= 24 && $hours > 0) {
                                                                return $timeStr = "{$hours}h ago";
                                                            }
                                                            elseif ($hours > 1300) {
                                                                $hours = (int)($hours / 720);
                                                                if ($hours == 1) {
                                                                    return $timeStr = "2 months ago";
                                                                } else {
                                                                    return $timeStr = "{$hours} months ago";
                                                                }
                                                            }
                                                            else {
                                                                return $timeStr = "{$minutes}min ago";
                                                            }
                                                        }
                                                    ?>
                                                    <p>
                                                        <small style="font-size: 13px">{{ $month }}</small><span>{{ $date }}</span>
                                                    </p>
                                                </div>
                                                <h4 class="blog-title">{{ $blog->name }}</h4>
                                            </div>
                                            <div class="blogs-image">
                                                <ul class="list-inline">
                                                    <li><img src="{{ url('public') }}/uploads/news/{{ $blog->image }}" alt="{{ $blog->name }}"></li>
                                                </ul>
                                            </div>
                                            <div class="intro">
                                                @foreach ($blog->newContent as $item)
                                                    @if ($item->img_header)
                                                    <div class="text-center" style="margin: 50px 0px">
                                                        <img src="{{ url('public') }}/uploads/news/{{ $item->img_header }}" alt="{{ $blog->name }}">
                                                    </div>
                                                    @endif
                                                    <p>
                                                        {{ $item->content }}
                                                    </p>
                                                    @if ($item->img_footer)
                                                    <div class="text-center">
                                                        <img src="{{ url('public') }}/uploads/news/{{ $item->img_footer }}" alt="{{ $blog->name }}">
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <footer class="article-extras clearfix">
                                            <ul class="post list-inline">
                                                <li class="author">{{ $blog->user->name }}</li>
                                                <li>/</li>
                                                <li class="comment">
                                                <a href="#">
                                                <span>{{ $blog->comments->count() }}</span> Comment </a>
                                                </li>
                                                <li class="post-action hidden-xs">
                                                <a class="btn btn-prev br" href="{{ route('blog.detail', [$id = $blogPrevious,$slug = Str::slug($blogPrevious->name)]) }}" title="Previous Article"><i class="fa fa-chevron-left"></i></a>
                                                <a class="btn btn-next" href="{{ route('blog.detail', [$id = $blogNext,$slug = Str::slug($blogNext->name)]) }}" title="Next Article"><i class="fa fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                            </footer>
                                            @if (Auth::check())
                                            <form method="get" action="{{ route('blog.comment', [$id = $blog->id, $user_id = Auth::user()->id]) }}" id="article-44831939-comment-form" class="comment-form" accept-charset="UTF-8">
                                                <input value="new_comment" name="form_type" type="hidden"><input name="utf8" value="✓" type="hidden">
                                                <div id="comment-form" class="comments">
                                                    <h6 class="general-title">Leave a comment</h6>
                                                    <ul class="contact-form row list-unstyled">
                                                        <li class="col-md-24">
                                                        <label for="comment_author" class="control-label">Your name <span class="req">*</span></label>
                                                        <input id="comment_author" name="name" class="form-control" type="text">
                                                        </li>
                                                        <li class="clearfix"></li>
                                                        <li class="col-md-24">
                                                        <label for="comment_email" class="control-label">Your email <span class="req">*</span></label>
                                                        <input id="comment_email" name="email" class="form-control" type="text">
                                                        </li>
                                                        <li class="clearfix"></li>
                                                        <li class="col-md-24">
                                                        <label for="comment_body" class="control-label">Your comment <span class="req">*</span></label>
                                                        <textarea id="comment_body" name="comment" cols="40" rows="5" class="form-control"></textarea>
                                                        </li>
                                                        <li class="clearfix"></li>
                                                        <li class="col-md-24 unpadding-top unpadding-bottom">
                                                        <button type="submit" id="comment-submit" class="btn btn-1 unmargin">Post Comment</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                            @else
                                            <div class="text-center">
                                                <p>Bạn cần đăng nhập để có thể bình luận</p>
                                                <a style="width: 170px" class="btn" href="{{ route('login') }}">LOGIN</a>
                                                <br>
                                            </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div id="comments" class="comments article-comment-container">
                                <h6 class="title-comment article-comment-title">Comments ({{ $blog->comments->count() }})</h6>
                                @foreach ($comments as $item)
                                
                                <div class="row">
                                    <div class="clearfix article-comment-post">
                                        <div class="post" style="margin-bottom: 0px">
                                            <span class="author"><span class="article-comment-name">{{ $item->name }}</span></span>
                                            <span class="article-comment-date">{{ commentTime($item->created_at) }}</span>
                                            <div class="article-comment-content">
                                                <p>{{ $item->comment }}</p>
                                            </div>
                                        </div>
                                        @if (Auth::check())
                                        <div class="article-comment-reply">
                                            <button onclick="replyComment({{ $item->id }})" title="Add your thoughts">Reply</button>
                                        </div>
                                        @else
                                        <div class="article-comment-reply">
                                            <button onclick="replyCommentLogin({{ $item->id }})" title="Add your thoughts">Reply</button>
                                        </div>
                                        @endif
                                        
                                        @if (Auth::check() && Auth::user()->id == $item->user_id)
                                        <div class="article-comment-reply">
                                            <a href="{{ route('blog.comment.delete', [$id = $item->id]) }}" title="Delete your comment">Delete</a>
                                        </div>
                                        @endif
                                        {{-- rep --}}
                                        <div style="margin: 0px -10px; transform: scale(0.9)">
                                        @foreach ($item->comment_rep as $item2)
                                        <div class="row">
                                            <div class="clearfix article-comment-post" style="padding-bottom: 0px">
                                                <div class="post" style="margin-bottom: 0px">
                                                    <span class="author"><span class="article-comment-name">{{ $item2->name }}</span></span>
                                                    <span class="article-comment-date">{{ commentTime($item2->created_at) }}</span>
                                                    <div class="article-comment-content">
                                                        <p>{{ $item2->comment }}</p>
                                                    </div>
                                                </div>
                                                @if (Auth::check())
                                                <div class="article-comment-reply">
                                                    <button onclick="replyComment2({{ $item->id }})" title="Add your thoughts">Reply</button>
                                                </div>
                                                @else
                                                <div class="article-comment-reply">
                                                    <button onclick="replyCommentLogin({{ $item->id }})" title="Add your thoughts">Reply</button>
                                                </div>
                                                @endif

                                                {{-- delete cmt --}}
                                                @if (Auth::check() && Auth::user()->id == $item2->user_id)
                                                <div class="article-comment-reply">
                                                    <a href="{{ route('blog.comment.rep.delete', [$id = $item2->id]) }}" title="Delete your comment">Delete</a>
                                                </div>
                                                @endif

                                                {{-- form --}}
                                                @if (Auth::check())
                                                <form class="blog-reply-form2{{ $item2->id }} display-none" method="get" action="{{ route('blog.comment.rep', [$id = $item->id, $user_id = Auth::user()->id]) }}" accept-charset="UTF-8">
                                                    <div class="comments-rep">
                                                        <ul class="contact-form row list-unstyled">
                                                            <li class="col-md-24">
                                                            <textarea id="comment_body" placeholder="Your comment" name="comment" cols="40" rows="3" class="form-control"></textarea>
                                                            </li>
                                                            <li class="col-md-10">
                                                            <input id="comment_author" placeholder="Your name" name="name" class="form-control" type="text">
                                                            </li>
                                                            <li class="col-md-10">
                                                            <input id="comment_email" placeholder="Your email" name="email" class="form-control" type="text">
                                                            </li>
                                                            <li class="col-md-4">
                                                            <button style="width: 100%; height: 40px;" type="submit" id="comment-submit" class="btn btn-1 unmargin">Send</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </form>
                                                @endif  
                                            </div>
                                            
                                        </div>
                                        @endforeach
                                    </div>
                                        {{--  --}}

                                        @if (Auth::check())
                                            <form class="blog-reply-form{{ $item->id }} display-none" method="get" action="{{ route('blog.comment.rep', [$id = $item->id, $user_id = Auth::user()->id]) }}" accept-charset="UTF-8">
                                                <div class="comments-rep">
                                                    <ul class="contact-form row list-unstyled">
                                                        <li class="col-md-24">
                                                        <textarea id="comment_body" placeholder="Your comment" name="comment" cols="40" rows="3" class="form-control"></textarea>
                                                        </li>
                                                        <li class="col-md-10">
                                                        <input id="comment_author" placeholder="Your name" name="name" class="form-control" type="text">
                                                        </li>
                                                        <li class="col-md-10">
                                                        <input id="comment_email" placeholder="Your email" name="email" class="form-control" type="text">
                                                        </li>
                                                        <li class="col-md-4">
                                                        <button style="width: 100%; height: 40px;" type="submit" id="comment-submit" class="btn btn-1 unmargin">Send</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        @else
                                            <div class="blog-reply-form-login{{ $item->id }} text-center display-none">
                                                <p>Bạn cần đăng nhập để có thể bình luận</p>
                                                <a style="width: 170px" class="btn" href="{{ route('login') }}">LOGIN</a>
                                                <br>
                                            </div>
                                        @endif  
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-24 col-sm-6 sidebar right-slidebar">
                                <div class="group_sidebar">
                                    <div class="sb-wrapper">
                                        <h6 class="sb-title"><i class="fa fa-pencil-square-o"></i> Recent Articles</h6>
                                        <div class="blogs sb-content">
                                            @foreach ($blogs as $item)
                                            <div class="blogs-item">
                                                <h4><a href="{{ route('blog.detail', [$id = $item->id, $slug = Str::slug($item->name)]) }}">{{ $item->name }}</a></h4>
                                                <ul class="post list-inline">
                                                    <li class="author">{{ $item->user->name }}</li>
                                                    <li>/</li>
                                                    <li class="comment">
                                                    <a href="#">
                                                        <span>{{ $item->comments->count() }}</span> Comment(s) </a>
                                                    </li>
                                                </ul>
                                                <div class="intro lines-limit">
                                                    {{ $item->description }}                                                
                                                </div>
                                            </div>
                                            @endforeach
                                            
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
<script>
    function replyComment(id) {
        $(".blog-reply-form"+id).toggle()
    }
    function replyComment2(id) {
        $(".blog-reply-form2"+id).toggle()
    }
    function replyCommentLogin(id) {
        $(".blog-reply-form-login"+id).show()
        setTimeout(function() { 
            $(".blog-reply-form-login"+id).fadeOut('fast'); 
        }, 5000); 
    }
</script>
@endsection