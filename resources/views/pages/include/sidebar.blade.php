<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Hot</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach ($phimhot_sidebar as $key => $hot_side)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_side->slug) }}" title="{{ $hot_side->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_side->image) }}" class="lazy post-thumb"
                                        alt="{{ $hot_side->title }}" title="{{ $hot_side->title }}" />
                                    <span class="is_trailer">
                                        @if ($hot_side->resolution == 0)
                                        FullHD
                                    @elseif ($hot_side->resolution == 1)
                                        HD
                                    @elseif ($hot_side->resolution == 2)
                                        SD
                                    @elseif ($hot_side->resolution == 3)
                                        CAM
                                    @elseif ($hot_side->resolution == 4)
                                        Trailer
                                    @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_side->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

