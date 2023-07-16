@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        {{ $news->news_title_slo }}
    @else
        {{ $news->news_title_en }}
    @endif
@endsection

<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <!-- News content start -->
                <div class="single-blog-details"> <img src="/frontend/images/news/{{ $news->news_image }}"
                        class="img-responsive single-blog-img" alt="" />
                    <div class="single-blog-content">
                        <h2>
                            @if (session()->get('language') == 'slovenian')
                                {{ $news->news_title_slo }}
                            @else
                                {{ $news->news_title_en }}
                            @endif
                        </h2>
                        @if (session()->get('language') == 'slovenian')
                            <h6>{{ $news->created_at->format('d M Y') }} objavil Admin</h6>
                            <div class="blog-post-by">
                                <ul>
                                    <li><i class="fa fa-eye"></i>20 ogledov</li>
                                    <li><i class="fa fa-comment"></i>12 komentarjev</li>
                                    <li><i class="fa fa-share-alt"></i>50 delitev</li>
                                    <li><i class="fa fa-tag"></i> življenjski slog, prijatelji, čudovito</li>
                                </ul>
                            </div>
                        @else
                            <h6>Posted on {{ $news->created_at->format('d M Y') }} by Admin</h6>
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
                                {!! html_entity_decode($news->news_details_slo) !!}
                            @else
                                {!! html_entity_decode($news->news_details_en) !!}
                            @endif
                        </p>
                    </div>
                </div>
                <!-- News content end -->

                <div class="space60"></div>

            </div>
            <!-- News sidebar start -->
            <div class="col-12 col-lg-3">
                <div class="left-block left-menu">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Novice po letih
                        @else
                            News by Year
                        @endif
                    </h3>
                    <ul>

                        @foreach ($years as $year)
                            <li><a href="{{ route('news.archive.year', $year) }}"
                                    title="Beehive styropor">{{ $year }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="left-block letest-post">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Najnovejše novice
                        @else
                            Latest News
                        @endif
                    </h3>
                    <ul>
                        @foreach ($latest as $latestNews)
                            <li><a href="{{ route('news.details', $latestNews->id) }}" title=""> <img
                                        src="/frontend/images/news/thumbs/{{ $latestNews->news_image }}"
                                        alt="post1">
                                    <p>
                                        @if (session()->get('language') == 'slovenian')
                                            {{ $latestNews->news_title_slo }}
                                        @else
                                            {{ $latestNews->news_title_en }}
                                        @endif
                                    </p>
                                    <span>{{ $latestNews->created_at->format('d M Y') }}</span>
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
            <!-- News sidebar end -->
        </div>
    </div>
</div>
@endsection
