@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Novice
    @else
        News Page
    @endif
@endsection

<!-- News start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">

                @foreach ($news as $singleNews)
                    <div class="bee-news">

                        <div class="news-image">
                            <div class="news-date">
                                {{ $singleNews->created_at->format('d M') }}<span>{{ $singleNews->created_at->format('Y') }}</span>
                            </div>
                            <img src="/frontend/images/news/thumbs/{{ $singleNews->news_image }}" alt="News 1" />

                        </div>

                        <div class="news-details">
                            <h4><a href="{{ route('news.details', $singleNews->id) }}" title="">
                                    @if (session()->get('language') == 'slovenian')
                                        {{ $singleNews->news_title_slo }}
                                    @else
                                        {{ $singleNews->news_title_en }}
                                    @endif
                                </a></h4>
                            <p>
                                @if (session()->get('language') == 'slovenian')
                                    {!! html_entity_decode($singleNews->news_excerpt_en) !!}
                                @else
                                    {!! html_entity_decode($singleNews->news_excerpt_slo) !!}
                                @endif
                            </p>
                            <div class="blog-post-by">
                                <ul>
                                    @if (session()->get('language') == 'slovenian')
                                        <li><i class="fa fa-user"></i>Objavil Admin</li>
                                        <li><i class="fa fa-comment"></i>12 komentarjev</li>
                                    @else
                                        <li><i class="fa fa-user"></i>By Admin</li>
                                        <li><i class="fa fa-comment"></i>12 comments</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $news->onEachSide(0)->links('frontend.body.pagination') }}
            </div>
            <!-- News sidebar start -->
            <div class="col-12 col-lg-3">
                <div class="left-block left-menu">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Novice v letu {{ $year }}
                        @else
                            News by month in {{ $year }}
                        @endif
                    </h3>
                    <ul>


                        @foreach ($months_slo as $key => $month)
                            <li class="{{ request()->is('news/archive/' . $year . '/' . $key) ? 'active' : '' }}">
                                <a href="{{ route('news.archive.month', [$year, $key]) }}"
                                    title="Beehive styropor">{{ $month }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="left-block left-menu">
                    <h3>
                        @if (session()->get('language') == 'slovenian')
                            Novice po letih
                        @else
                            News by Year
                        @endif
                    </h3>
                    <ul>
                        @foreach ($years as $key => $year)
                            <li class="{{ request()->is('news/archive/' . $year . '/*') ? 'active' : '' }}"><a
                                    href="{{ route('news.archive.year', $year) }}"
                                    title="Beehive styropor">{{ $year }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- News End -->
        </div>
    </div>
</div>
@endsection
