@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'slovenian')
        Prispevki
    @else
        Blog Page
    @endif
@endsection

<!-- Blog start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    @forelse ($blogpost as $blog)
                        <div class="col-md-6">
                            <!-- Blog item start -->

                            <div class="blog-item wow fadeInUp">
                                <a href="{{ route('post.details', $blog->id) }}">
                                    <div class="blog-item-bg" style="height:100%"><img
                                            src="/frontend/images/posts/thumbs/{{ $blog->post_image }}">
                                    </div>
                                </a>
                                <div class="blog-content">
                                    <h3>
                                        @if (session()->get('language') == 'slovenian')
                                            {{ $blog->post_title_slo }}
                                        @else
                                            {{ $blog->post_title_en }}
                                        @endif
                                    </h3>
                                    <div class="blog-post-by">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('d M Y') }}
                                            </li>
                                            <li><i class="fa fa-user"></i>Admin</li>
                                        </ul>
                                    </div>
                                    <p>
                                        @if (session()->get('language') == 'slovenian')
                                            {!! Str::limit($blog->post_details_slo, 200) !!}
                                        @else
                                            {!! Str::limit($blog->post_details_en, 200) !!}
                                        @endif
                                    </p>
                                </div>
                                <div class="continue-read-blog"><a href="{{ route('post.details', $blog->id) }}"
                                        title="">
                                        @if (session()->get('language') == 'slovenian')
                                            Preberi več
                                        @else
                                            Continue Reading
                                        @endif
                                    </a></div>
                                <div class="blog-action">
                                    <div class="blog-action-holder"><a href="" title=""><i
                                                class="fa fa-thumbs-o-up"></i></a><a href="" title=""><i
                                                class="fa fa-thumbs-o-down"></i></a></div>
                                    <div class="blog-action-holder"><a href="" title=""><i
                                                class="fa fa-heart"></i></a><a href="" title=""><i
                                                class="fa fa-share-alt"></i></a><a href="" title=""><i
                                                class="fa fa-comments-o"></i></a></div>
                                </div>
                            </div>

                            <!-- Blog item end -->
                        </div>

                    @empty

                        <div class="col-12 col-lg-10 offset-lg-1">
                            <div class="error-section"> <img src="{{ asset('assets/images/404.png') }}"
                                    alt="" />
                                @if (session()->get('language') == 'slovenian')
                                    <p>V tej kategoriji ni prispevkov. </p>
                                    <a href="/posts" class="bee-button cta-btn">Nazaj</a>
                                @else
                                    <p>There is no post in that category </p>
                                    <a href="/posts" class="bee-button cta-btn">Back</a>
                                @endif
                            </div>
                        </div>
                    @endforelse
                </div>
                {{ $blogpost->onEachSide(0)->links('frontend.body.pagination') }}

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
                        @foreach ($blogcategory as $category)
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
                            title="Smoker">Smoker</a> <a href="#" title="Jackate">Jackate</a> <a href="#"
                            title="Beekeeping Brush">Beekeeping
                            Brush</a>
                    @endif
                </div>
            </div>
            <!-- Blog sidebar end -->
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
