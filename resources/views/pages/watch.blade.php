@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('category', [$movie->category->slug]) }}">{{ $movie->category->title }}</a>
                                    » <span><a
                                            href="{{ route('country', [$movie->country->slug]) }}">{{ $movie->country->title }}</a>
                                        » <span class="breadcrumb_last"
                                            aria-current="page">{{ $movie->title }}</span></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">
                    <style>
                        #main-contents {
                            width: 100%;
                        }
                    </style>
                    @foreach ($movie->episode as $ep)
                        {!! $ep->linkphim !!}
                    @endforeach
                    <div class="button-watch">
                        <ul class="halim-social-plugin col-xs-4 hidden-xs">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                data-size="small" data-show-faces="true" data-share="true"></li>
                        </ul>
                        <ul class="col-xs-12 col-md-8">
                            <div id="autonext" class="btn-cs autonext">
                                <i class="icon-autonext-sm"></i>
                                <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                            </div>
                            <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                                Expand
                            </div>
                            <div id="toggle-light"><i class="hl-adjust"></i>
                                Light Off
                            </div>
                            <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                            <div class="luotxem"><i class="hl-eye"></i>
                                <span>1K</span> lượt xem
                            </div>
                            <div class="luotxem">
                                <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false"
                                    aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                            </div>
                        </ul>
                    </div>
                    <div class="collapse" id="moretool">
                        <ul class="nav nav-pills x-nav-justified">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                data-size="small" data-show-faces="true" data-share="true"></li>
                            <div class="fb-save" data-uri="" data-size="small"></div>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h1 class="card-title"><span style="color:#ffed4d">{{ $movie->title }}</span></h1>
                        <h2 class="card-title" style="margin-top: 10px;"><span
                                style="color:#ffffff">{{ $movie->name_eng }}</span></h2>
                        <p class="card-text" style="background-color:#464646;"><span
                                style="color:#dbdbdb">{{ $movie->description }}</span></p>
                    </div>


                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-37976" class="item-content post-37976"></article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="halim-ajax-list-server"></div>
                    </div>
                    <div id="halim-list-server">
                        <ul class="nav nav-tabs" role="tablist">
                            <h2 class="section-title"><span style="color:#ffed4d">Danh sách tập phim</span></h2>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                <div class="halim-server">
                                    <ul class="halim-list-eps">
                                        @foreach ($movie->episode as $key=>$st)
                                            <a href="{{ route('sotap') }}">
                                                <li class="halim-episode"><span
                                                        class="halim-btn halim-btn-2 {{$key==0 ? 'active' : ''}} halim-info-1-1 box-shadow"
                                                        data-post-id="37976" data-server="1" data-episode="1"
                                                        data-position="first" data-embed="0"
                                                        data-title="Xem phim {{ $movie->title }} - {{ $movie->name_eng }} - tập {{$st->episode}}"
                                                        data-h1="{{ $movie->title }} - {{$st->episode}}">{{$st->episode}}</span></li>
                                            </a>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="htmlwrap clearfix">
                        <div id="lightout"></div>
                    </div>
            </section>
            <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
            </div>
            @php
                $url = Request::url();
                
            @endphp
            <div class="fb-comments" data-href="{{ $url }}" data-width="100%" data-numposts="5"></div>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach ($related as $key => $hot)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie', $hot->slug) }}"
                                        title="{{ $hot->title }}">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/movie/' . $hot->image) }}"
                                                alt="{{ $hot->title }}" title="Đại Thánh Vô Song"></figure>
                                        <span class="status">
                                            @if ($movie->resolution == 0)
                                                FullHD
                                            @else
                                                @if ($movie->resolution == 1)
                                                    HD
                                                @else
                                                    @if ($movie->resolution == 2)
                                                        SD
                                                    @else
                                                        CAM
                                                    @endif
                                                @endif
                                            @endif
                                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if ($movie->phude == 0)
                                                Vietsub
                                            @else
                                                @if ($movie->phude == 1)
                                                    Lòng Tiếng
                                                @else
                                                    Không Phụ Đề
                                                @endif
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $hot->title }}</p>
                                                <p class="original_title">{{ $hot->name_eng }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                    <script>
                        $(document).ready(function($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 5
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>

    </div>

    </div>
    </section>
    </main>
    </div>
    </div>
@endsection
