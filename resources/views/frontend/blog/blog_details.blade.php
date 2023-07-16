@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        {{ $blogPost->post_title_slo }}
    @else
        {{ $blogPost->post_title_en }}
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- Blog content start -->
                <div class="single-blog-details"> <img src="/frontend/images/posts/{{ $blogPost->post_image }}"
                        class="img-responsive single-blog-img" alt="" />
                    <div class="single-blog-content">
                        <h2>
                            @if (session()->get('language') == 'slovenian')
                                {{ $blogPost->post_title_slo }}
                            @else
                                {{ $blogPost->post_title_en }}
                            @endif
                        </h2>
                        @if (session()->get('language') == 'slovenian')
                            <h6>{{ $blogPost->created_at->format('d M Y') }} objavil Admin</h6>
                            <div class="blog-post-by">
                                <ul>
                                    <li><i class="fa fa-eye"></i>20 ogledov</li>
                                    <li><i class="fa fa-comment"></i>12 komentarjev</li>
                                    <li><i class="fa fa-share-alt"></i>50 delitev</li>
                                    <li><i class="fa fa-tag"></i> življenjski slog, prijatelji, čudovito</li>
                                </ul>
                            </div>
                        @else
                            <h6>Posted on {{ $blogPost->created_at->format('d M Y') }} by Admin</h6>
                            <div class="blog-post-by">
                                <ul>
                                    <li><i class="fa fa-eye"></i>20 View</li>
                                    <li><i class="fa fa-comment"></i>12 comments</li>
                                    <li><i class="fa fa-share-alt"></i>50 share</li>
                                    <li><i class="fa fa-tag"></i>life style, friends, wonderful</li>
                                </ul>
                            </div>
                        @endif

                        <p>
                            @if (session()->get('language') == 'slovenian')
                                {!! html_entity_decode($blogPost->post_details_slo) !!}
                            @else
                                {!! html_entity_decode($blogPost->post_details_en) !!}
                            @endif
                        </p>
                    </div>
                </div>
                <!-- Blog content end -->

                <div class="space60"></div>

                <!-- Related blog start -->
                <div class="you-may-like">
                    <h4 class="mb20 text-uppercase">
                        @if (session()->get('language') == 'slovenian')
                            Vas zanima tudi ...
                        @else
                            You may also like
                        @endif
                    </h4>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="blog-item wow fadeInUp">
                                    <a href="{{ route('post.details', $relatedPost->id) }}">
                                        <div class="blog-item-bg" style="height:100%"><img
                                                src="/frontend/images/posts/thumbs/{{ $relatedPost->post_image }}"
                                                alt="">
                                        </div>
                                    </a>
                                    <div class="blog-content">
                                        @if (session()->get('language') == 'slovenian')
                                            <h3>
                                                {{ $relatedPost->post_title_slo }}
                                            </h3>
                                            <p>
                                                {!! Str::limit($relatedPost->post_details_slo, 200) !!}
                                            </p>
                                            <h6>Prispevek ustvaril Admin
                                                {{ $relatedPost->created_at->format('d M Y') }}</h6>
                                        @else
                                            <h3>
                                                {{ $relatedPost->post_title_en }}
                                            </h3>
                                            <p>
                                                {!! Str::limit($relatedPost->post_details_en, 200) !!}

                                            </p>
                                            <h6>Posted on {{ $relatedPost->created_at->format('d M Y') }} by
                                                Admin</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Related blog end -->

                <!-- Comment start -->
                <div class="comment-sec">
                    @if (session()->get('language') == 'slovenian')
                        <h4 class="mb20 text-uppercase">3 komentarji na ta prispevek</h4>
                        <div class="media"> <img src="{{ asset('frontend/assets/images/comment-pic1.jpg') }}"
                                alt="Commnet">
                            <div class="media-body">
                                <h6 class="mt-0">Kate Winless <span><i class="fa fa-clock-o"></i> 14th Feb 2015
                                        at 9.00 am</span></h6>
                                <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque
                                    ipsum
                                    sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget
                                    fringilla. Duis lobortis cursus mi vel tristique.</p>
                                <a href="" title="">Reply</a>
                                <div class="media mt-3"> <img
                                        src="{{ asset('frontend/assets/images/comment-pic2.jpg') }}" alt="" />
                                    <div class="media-body">
                                        <h6 class="mt-0">Kate Winless</h6>
                                        <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui.
                                            Pellentesque
                                            ipsum sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo
                                            turpis, eget fringilla. Duis lobortis cursus mi vel tristique.</p>
                                        <a href="" title="">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media"> <img src="{{ asset('frontend/assets/images/comment-pic1.jpg') }}"
                                alt="Commnet">
                            <div class="media-body">
                                <h6 class="mt-0">Kate Winless <span><i class="fa fa-clock-o"></i> 14th Feb 2015
                                        at 9.00 am</span></h6>
                                <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque
                                    ipsum
                                    sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget
                                    fringilla. Duis lobortis cursus mi vel tristique.</p>
                                <a href="" title="">Reply</a>
                            </div>
                        </div>
                    @else
                        <h4 class="mb20 text-uppercase">3 Thoughts on “Single Post”</h4>
                        <div class="media"> <img src="{{ asset('frontend/assets/images/comment-pic1.jpg') }}"
                                alt="Commnet">
                            <div class="media-body">
                                <h6 class="mt-0">Kate Winless <span><i class="fa fa-clock-o"></i> 14th Feb 2015
                                        at 9.00 am</span></h6>
                                <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque
                                    ipsum
                                    sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget
                                    fringilla. Duis lobortis cursus mi vel tristique.</p>
                                <a href="" title="">Reply</a>
                                <div class="media mt-3"> <img
                                        src="{{ asset('frontend/assets/images/comment-pic2.jpg') }}" alt="" />
                                    <div class="media-body">
                                        <h6 class="mt-0">Kate Winless</h6>
                                        <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui.
                                            Pellentesque
                                            ipsum sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo
                                            turpis, eget fringilla. Duis lobortis cursus mi vel tristique.</p>
                                        <a href="" title="">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media"> <img src="{{ asset('frontend/assets/images/comment-pic1.jpg') }}"
                                alt="Commnet">
                            <div class="media-body">
                                <h6 class="mt-0">Kate Winless <span><i class="fa fa-clock-o"></i> 14th Feb 2015
                                        at 9.00 am</span></h6>
                                <p>Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque
                                    ipsum
                                    sque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget
                                    fringilla. Duis lobortis cursus mi vel tristique.</p>
                                <a href="" title="">Reply</a>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Comment end -->

                <!-- Comment form start -->
                <div class="comment-form">
                    @if (session()->get('language') == 'slovenian')
                        <h3>Oddaj komentar</h3>
                        <p>Vaš elektronski naslov ne bo objavljen. Obvezna polja so označena.</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Ime">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Sporočilo"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-submit">Pošlji</button>
                            </div>
                        </form>
                    @else
                        <h3>Leave a Comment</h3>
                        <p>Your email address will not be published. Required fields are marked</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                    @endif
                </div>
                <!-- Comment form end -->
            </div>
            <!-- Blog sidebar start -->
            <div class="col-12 col-lg-3">
                <div class="left-block left-menu">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Kategorije
                        @else
                            Categories
                        @endif
                    </h3>
                    <ul>
                        @foreach ($blogCategories as $category)
                            <li class="{{ request()->is('blog/category/post/' . $category->id) ? 'active' : '' }}">
                                <a href="{{ url('blog/category/post/' . $category->id) }}" title="">
                                    @if (session()->get('language') == 'slovenian')
                                        {{ $category->blog_category_name_slo }}
                                    @else
                                        {{ $category->blog_category_name_en }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="left-block letest-post">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Najnovejši prispevki
                        @else
                            Latest Post
                        @endif
                    </h3>
                    <ul>
                        @foreach ($latest as $latestPost)
                            <li><a href="{{ route('post.details', $latestPost->id) }}" title=""> <img
                                        src="/frontend/images/posts/thumbs/{{ $latestPost->post_image }}"
                                        alt="post1">
                                    <p>
                                        @if (session()->get('language') == 'slovenian')
                                            {{ $latestPost->post_title_slo }}
                                        @else
                                            {{ $latestPost->post_title_en }}
                                        @endif
                                    </p>
                                    <span>{{ $latestPost->created_at->format('d M Y') }}</span>
                                </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="left-block blog-tags">
                    @if (session()->get('language') == 'slovenian')
                        <h3>Oznake</h3>
                        <a href="#" title="Beekeeping Hive">Čebelnjak</a> <a href="#"
                            title="Smoker">Kadilo</a> <a href="#" title="Jackate">Obleka</a> <a href="#"
                            title="Beekeeping Brush">
                            Krtača</a>
                    @else
                        <h3>Tags</h3>
                        <a href="#" title="Beekeeping Hive">Beekeeping Hive</a> <a href="#"
                            title="Smoker">Smoker</a> <a href="#" title="Jackate">Jackate</a> <a
                            href="#" title="Beekeeping Brush">Beekeeping
                            Brush</a>
                    @endif
                </div>
            </div>
            <!-- Blog sidebar end -->
        </div>
    </div>
</div>
@endsection
