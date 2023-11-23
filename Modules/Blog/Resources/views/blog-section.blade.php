<section class="news-section-three">
    <div class="auto-container">
        <div class="inner-container d-flex justify-content-between flex-wrap align-items-center mb-4">
            <div class="button-box">
                <a href="/blog" class="theme-btn btn-style-twelve clearfix">
                      <span class="btn-wrap">
                        <span class="text-one">نمایش تمامی مقاله‌ها</span>
                        <span class="text-two">نمایش تمامی مقاله‌ها</span>
                      </span>
                </a>
            </div>
            <div class="sec-title centered mb-0 " >
                <h4>
                    <b>مقاله‌های</b> <span>اخیر </span>
                </h4>
            </div>
        </div>

        <div class="row clearfix">
            <div class="column col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                @if($items)
                    @foreach( $items->slice(0 ,3) as $item )
                        <div class="news-block-four" style="width: 100%">
                            <div class="inner-box d-flex justify-content-between">
                                <div class="content">
                                    <ul class="post-info">
                                        <li>{{Helpers::jalaliToGregorianAndConversely($item->created_at ,format:'d F, Y')}}</li>
                                        <li>{{$item->category->first()?->title}}</li>
                                    </ul>
                                    <h6>
                                        <a href="/blog/{{$item->slug}}">
                                            {{$item->title}}
                                        </a>
                                    </h6>
                                </div>
                                <div class="image">
                                    <a href="/blog/{{$item->slug}}">
                                        <img src="{{$item->images['thumbnail'] ?? ''}}" width="140" height="108" alt="{{$item->title}}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="column col-lg-8 col-md-12 col-sm-12">
                <div class="row clearfix">
                    @if($items)
                        @foreach( $items->slice(3 ,2) as $item )
                            <div key={k} class="news-block-three col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="/blog/{{$item->slug}}">
                                            <img src="{{$item->images['cover'] ?? ''}}" width="420" height="315" alt="{{$item->title}}" />
                                        </a>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-info">
                                            <li>{{$item->category->first()?->title}}</li>
                                            <li>{{Helpers::jalaliToGregorianAndConversely($item->created_at ,format:'d F, Y')}}</li>
                                        </ul>
                                        <h5>
                                            <a href="/blog/{{$item->slug}}">
                                                {{$item->title}}
                                            </a>
                                        </h5>
                                        <div class="text" dir="rtl">
                                            {{Str::of($item->summary)->limit(150)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
