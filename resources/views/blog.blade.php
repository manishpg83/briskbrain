@extends('layouts.app')
@section('title', $title)
@section('meta-title', $metaTitle)
@section('meta-description', $metaDescription)
@section('meta-keywords', $metaKeywords)

@section('og-locale', $ogLocale ?? 'en_US')
@section('og-type', $ogType ?? 'website')
@section('og-site-name', $ogSiteName ?? 'BriskBrain')
@section('og-url', $ogUrl ?? url()->current())
@section('og-title', $ogTitle ?? $metaTitle)
@section('og-description', $ogDescription ?? $metaDescription)

@section('content')
    <section class="banner-section blog-banner">
        <div class="container">
            <div class="contents">
                <h1>Welcome to Our Blog!</h1>
                <p>Do you want to discuss your project with us? Well, give us a call, send us an email or fill out below
                    form.</p>
            </div>
        </div>
    </section>
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="blog-content">
                    <h2 class="goalrow">Explore, Learn, and Get Inspired</h2>
                    <p>Welcome to our corner of the internet, where we share insights, stories, and updates about our work, industry trends, and much more. Whether you're here to learn something new, stay updated, or spark your next big idea, we've got you covered.
                    </p>
                    <p>&nbsp;</p>
                    <h2 class="goalrow">Why Follow Our Blog?</h2>                   
                    <p><strong>Expert Insights:</strong> Gain knowledge from our team of professionals who live and breathe Website design and development.</p>
                    <p><strong>Practical Tips:</strong> Find actionable advice to help you tackle real-world challenges.</p>
                    <p><strong>Inspiring Stories:</strong> Discover how ideas are transformed into success stories.</p>
                 

                        <ul class="blog-content-common">
                            <li>
                                @foreach ($posts as $postitem)
                            <li>
                                <div class="image-blog">
                                    <a href="{{ url('blogsingle/' . $postitem->slug) }}">
                                        <div class="overlay"></div>
                                        <figure class="blog-pic"><img class="img-fluid" src="{{ $postitem->image }}"
                                                alt=""></figure>
                                    </a>
                                </div>
                                <p class="time">{{ $postitem->created_at->format('F d, Y') }} <span></span></p>
                                <a href="{{ url('blogsingle/' . $postitem->slug) }}" class="blog-title">
                                    <h5 class="blog-title">{{ $postitem->name }}</h5>
                                </a>
                                <div class="box">
                                    <ul class="blog-info">
                                        @if ($postitem->comments->count() == 0)
                                            <li class="comment"><a href="javascript:void(0)">No comments yet</a></li>
                                        @else
                                            <li class="comment"><a
                                                    href="javascript:void(0)">{{ $postitem->comments->count() }}
                                                    comments</a></li>
                                        @endif
                                        <li class="icon-men">By Admin</li>
                                    </ul>
                                </div>
                                <p>{{ strlen(strip_tags($postitem->description)) > 50 ? substr(strip_tags($postitem->description), 0, 50) . '...' : strip_tags($postitem->description) }}
                                </p>
                                <a href="{{ url('blogsingle/' . $postitem->slug) }}" class="know-more">Read more</a>
                                <div class="social-media-box socialbox">
                                    <ul>
                                        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url('blogsingle/' . $postitem->slug) }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" href="https://www.linkedin.com/shareArticle?url={{ url('blogsingle/' . $postitem->slug) }}"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ url('blogsingle/' . $postitem->slug) }}&text=Check%20out%20this%20awesome%20blog%20post%3A%20{{ urlencode($postitem->name) }}"><i class="fa fa-twitter"></i></a></li>                                       
                                        <li><a target="_blank" href="https://api.whatsapp.com/send?text=Check%20out%20this%20awesome%20blog%20post%3A%20{{ urlencode($postitem->name) }}%20- {{ url('blogsingle/' . $postitem->slug) }}"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                            <div class="paging-block"> {{ $posts->links('vendor.pagination.bootstrap-4') }}
                            </div>
                            Join the Conversation
                            Have questions, insights, or thoughts? We'd love to hear from you! Comment on posts, share with your network, or reach out to us directly.
                    </div>
                </div>
                <aside class="col-md-4 col-lg-3">
                    <div class="blog-sidebar">
                        <div class="cmn-box archive blog-content-common">
                            <h4>Recent Posts</h4>
                            @foreach ($latestpost as $latestitem)
                                <div class="article-box">
                                    <div class="image-blog">
                                        <a href="{{ url('blogsingle/' . $latestitem->slug) }}">
                                            <div class="overlay"></div>
                                            <figure class="blog-pic"><img class="img-fluid" src="{{ $latestitem->image }}"
                                                    alt=""></figure>
                                        </a>
                                    </div>
                                    <a class="blog-title" text-decoration="none"
                                        href="{{ url('blogsingle/' . $latestitem->slug) }}">
                                        <h6
                                            style="margin-left: 4px; margin-top: 7px; font-size: medium;
                                    ">
                                            {{ $latestitem->name }}</h6>
                                    </a>
                                    <p class="time fa fa-calendar blogsingle-calendar">
                                            {{ $latestitem->created_at->format('F d, Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="cmn-box archive">
                            <h4>Archives</h4>
                            <ul>
                                @foreach ($archives as $month => $posts)
                                    <li>
                                        <a href="#" class="month-link">{{ $month }}</a>
                                        <ul class="post-submenu" style="display: none">
                                            @foreach ($posts as $post)
                                                <li><a
                                                        href="{{ route('blogsingle', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="cmn-box">
                            <h4>Pages</h4>
                            <ul>
                                <li><a href="{{ url('home') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About</a></li>
                                <li><a href="{{ url('service') }}">Services</a></li>
                                <li><a href="{{ url('portfolio') }}">Portfolio</a></li>
                                <li><a href="{{ url('blog') }}">Blog</a></li>
                                <li><a href="{{ url('contact') }}">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add click event listener to month links
        $('.month-link').click(function(event) {
            event.preventDefault(); // prevent default link behavior
            var submenu = $(this).next('.post-submenu');
            if (submenu.is(':visible')) {
                submenu.hide();
            } else {
                submenu.show();
            }
        });
    });
</script>
