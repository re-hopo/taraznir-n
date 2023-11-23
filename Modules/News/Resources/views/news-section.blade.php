
<section class="news-section-two">
    <div class="auto-container">
        <div class="sec-title centered">
            <h4>
                <b>اخبار</b> <span> لیست به روزترین اخبار </span>
            </h4>
        </div>
        <div class="row clearfix">
            @if($items)
                @foreach( $items as $item)
                    <div class="news-block-two col-lg-4 col-md-6 col-sm-12">
                        <div
                            class="inner-box wow fadeInLeft"
                            data-wow-delay="0ms"
                            data-wow-duration="1500ms"
                            dir="rtl"
                        >
                            <div class="image">
                                @if($item->category->isNotEmpty())
                                    @foreach($item->category as $cat)
                                        <div class="tag"> {{$cat->title}}</div>
                                    @endforeach
                                @endif

                                <a href="news/{{$item->slug}}">
                                    <img src="{{$item->images['cover'] ?? ''}}" width="420" height="315" alt="{{$item->title}}" />
                                </a>
                            </div>
                            <div class="lower-content">
                                <div class="info">
                                    توسط: <span> {{\Modules\Theme\Helpers\Helpers::getMetaValueByKey($item ,'author')}} </span>
                                    <b>{{Helpers::jalaliToGregorianAndConversely($item->created_at ,format:'d F, Y')}}</b>
                                </div>
                                <h6>
                                    <a href="news/{{$item->slug}}">
                                        {{$item->title}}
                                    </a>
                                </h6>
                                <a class="read-more" href="news/{{$item->slug}}">
                                    ادامه مطلب
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="button-box text-center">
            <a href="/news" class="theme-btn btn-style-one">
                بیشتر <span class="icon flaticon-left-arrow" ></span>
            </a>
        </div>
    </div>
</section>
